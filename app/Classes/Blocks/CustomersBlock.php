<?php

namespace App\Classes\Blocks;

use Carbon\Carbon;
use App\Customer;
use App\Helpers;
use DB;

/**
 * Class CustomersBlock
 * @package App\Classes\Blocks
 */
class CustomersBlock extends IBlock
{
    /**
     * @return array
     */
    public function get()
    {
        $customers=Customer::where('is_enabled', true)->get();

        $customers_ids=array_pluck($customers, 'id');

        $logotypes=DB::table('system_files')
            ->where('field', 'image')
            ->where('is_public', true)
            ->where('attachment_type', 'Perevorot\Dozorro\Models\Customer')
            ->whereIn('attachment_id', $customers_ids)
            ->get();

        $customers=$customers->each(function($customer) use($logotypes){
            $logotype=array_first($logotypes, function($k, $logotype) use ($customer){
                return $logotype->attachment_id==$customer->id;
            });

            if(!empty($logotype)){
                $customer->logo=Helpers::getStoragePath($logotype->disk_name);
            }

            if(!empty($customer->edrpou)){
                $customer->url='/edrpou/?code='.str_replace("\r\n", ",", $customer->edrpou);
            }
        });

        $customers=array_where($customers, function($key, $customer){
            return !empty($customer->logo);
        });

	    return (object) [
            'customers' => $customers
        ];
    }
}
