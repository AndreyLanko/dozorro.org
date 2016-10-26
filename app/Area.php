<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Area
 * @package App
 */
class Area extends Model
{
    /**
     * @var string
     */
    protected $table = 'perevorot_dozorro_areas';

    /**
     * @param $query
     * @return mixed
     */
    public function scopeIsEnabled($query)
    {
        return $query->where('is_enabled', true);
    }
}
