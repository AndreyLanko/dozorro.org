<?php

namespace App\Classes\Blocks;

use App\JsonForm;
use DB;
use App\TenderStatistic;

/**
 * Class ActualTendersAndReviews
 * @package App\Classes\Blocks
 */
class SearchFormWithStatistics extends IBlock
{
    /**
     * @return array
     */
    private function getData()
    {
        /**
         * @var array $tenders
         */
        $data = TenderStatistic::first();

        if($data->comments == '{COMMENTS}')
        {
            $data->comments = JsonForm::getCommentsCount();
        }
        if($data->reviews == '{REVIEWS}')
        {
            $data->reviews = JsonForm::getReviewsCount();
        }

        return $data;
    }


    /**
     * @return array
     */
    public function get()
    {
        return [
            'stats' => $this->getData(),
        ];
    }
}
