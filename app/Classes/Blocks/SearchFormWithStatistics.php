<?php

namespace App\Classes\Blocks;

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
