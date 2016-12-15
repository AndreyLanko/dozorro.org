<?php

namespace App\Classes\Blocks;

use App\ActualTender;
use App\JsonForm;
use Carbon\Carbon;
use DB;

/**
 * Class ActualTendersAndReviews
 * @package App\Classes\Blocks
 */
class ActualTendersAndReviews extends IBlock
{
    /**
     * @return array
     */
    private function getTenders()
    {
        /**
         * @var array $tenders
         */
        $tenders = ActualTender::orderBy('sort_order', 'asc')->limit($this->block->value->actual_tenders_limit);
        $tender_ids = [];

        foreach ($tenders as $tender) {
            $tender->data = current(json_decode($tender->data)->items);

            if(isset($tender->data)) {
                array_push($tender_ids, $tender->data->id);
            }
        }
        
        $forms = JsonForm::whereIn('tender', $tender_ids)->get();
        
        foreach ($tenders as $tender) {
            $tender->reviews=array_where($forms, function($key, $form) use ($tender){
                return $form->tender==$tender->data->id;
            });
        }

        return $tenders;
    }

    /**
     * @return array
     */
    private function getReviews()
    {
        /**
         * @var array $comments
         */
        $reviews = DB::table('perevorot_dozorro_review_rating')->limit($this->block->value->last_reviews_limit)->get();
        Carbon::setLocale('uk');
        
        foreach ($reviews as $review) {
            $review->data = json_decode($review->data);
            $review->data->last_review_date=new Carbon($review->data->last_review_date);
        }

        return $reviews;
    }
    
    /**
     * @return array
     */
    public function get()
    {
        return [
            //'reviews' => $this->getReviews(),
            'tenders' => $this->getTenders(),
        ];
    }
}
