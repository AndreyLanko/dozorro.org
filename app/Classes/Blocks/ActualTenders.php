<?php

namespace App\Classes\Blocks;

use App\ActualTender;
use Illuminate\Support\Facades\DB;

/**
 * Class ActualTenders
 * @package App\Classes\Blocks
 */
class ActualTenders extends IBlock
{
    /**
     * @return array
     */
    public function get()
    {
        /**
         * @var array $tenders
         */
        $tenders = ActualTender::get();

        foreach ($tenders as $tender) {
            $tender->data = json_decode($tender->data);
        }

        return $tenders;
    }
}
