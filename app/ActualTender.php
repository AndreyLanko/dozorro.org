<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActualTender extends Model
{
    protected $table = 'perevorot_dozorro_actual_tenders';

    public function get_format_data()
    {
        if(isset($this->data)) {
            $items = json_decode($this->data);

            if (isset($items->items) && !empty($items->items)) {
                return current($items->items);
            }
        }

        return false;
    }

    public function scopeLimit($query, $limit)
    {
        if($limit > 1)
        {
            return $query->take($limit)->get();
        }
        elseif($limit == 1)
        {
            return $query->first();
        }
        elseif(!$limit)
        {
            return $query->get();
        }
    }

    public static function getAllActualTenders($params = [])
    {
        return self::limit(@$params['limit']);
    }

}
