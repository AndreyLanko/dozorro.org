<?php

namespace App\Classes\Blocks;

use Illuminate\Support\Facades\DB;

/**
 * Class ActualTenders
 * @package App\Classes\Blocks
 */
class ActualTenders implements IBlock
{
    /**
     * @return array
     */
    public function get()
    {
        /**
         * @var array $tenders
         */
        $tenders = DB::table('perevorot_dozorro_actual_tenders')->get();

        foreach ($tenders as $tender) {
            $tender->data = json_decode($tender->data);
        }

        return $tenders;
    }
}
