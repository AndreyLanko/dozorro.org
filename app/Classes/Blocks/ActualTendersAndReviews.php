<?php

namespace App\Classes\Blocks;

use App\ActualTender;
use App\JsonForm;

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
        $tenders = ActualTender::get();

        foreach ($tenders as $tender) {
            $tender->data = json_decode($tender->data);

            if(isset($tender->data)) {
                $tender->count_reviews = JsonForm::where('schema', 'F101')
                    ->where('tender', $tender->data->id)
                    ->get()
                    ->count();
            }
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
        $comments = JsonForm::where('schema', 'F101')->limit($this->block->value->last_reviews_limit)->get();

        foreach ($comments as $comment) {
            $comment->payload = json_decode($comment->payload);
        }

        return $comments;
    }
    
    /**
     * @return array
     */
    public function get()
    {
        return [
            'reviews' => $this->getReviews(),
            'tenders' => $this->getTenders(),
        ];
    }
}
