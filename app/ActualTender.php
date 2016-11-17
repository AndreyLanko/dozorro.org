<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActualTender extends Model
{
    protected $table = 'perevorot_dozorro_actual_tenders';
    
    public static function getAllActualTenders()
    {
        return self::get();
    }

}
