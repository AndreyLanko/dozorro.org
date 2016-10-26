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
     * @var string
     */
    protected $backendNamespace = 'Perevorot\Dozorro\Models\Area';

    /**
     * @param $query
     * @return mixed
     */
    public function scopeIsEnabled($query)
    {
        return $query->where('is_enabled', true);
    }

    /**
     * @return mixed
     */
    public function image()
    {
        return Image::where('attachment_type', $this->backendNamespace)
            ->where('attachment_id', $this->id)
            ->where('field', 'image')
            ->orderBy('id', 'DESC')
            ->first()
        ;
    }
}
