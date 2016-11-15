<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class JsonForm
 * @package App
 */
class JsonForm extends Model
{
    /**
     * @var string
     */
    protected $table = 'perevorot_dozorro_json_forms';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    public $dates = [
        'created_at'
    ];

    /**
     * @return string
     */
    public function getRatingAttribute()
    {
        $data = json_decode($this->data);

        if (!isset($data->generalScore)) {
            return '';
        }

        return $data->generalScore;
    }

    /**
     * @return string
     */
    public function getCommentAttribute()
    {
        $data = json_decode($this->data);

        if (!isset($data->generalComment)) {
            return '';
        }

        return $data->generalComment;
    }

    /**
     * @return objetc
     */
    public function getJsonAttribute()
    {
        return json_decode($this->data);
    }

    public static function getF112Enum($key)
    {
        $data = json_decode(file_get_contents(public_path() . '/sources/forms/F112.json'), true);
    
        return array_get($data, 'properties.userForm.form.1.items.0.titleMap.' . $key);
    }
}
