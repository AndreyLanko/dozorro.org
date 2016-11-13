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
        'date'
    ];

    /**
     * @return object
     */
    public function getJsonAttribute()
    {
        $data=json_decode($this->payload);

        return $data->userForm;
    }

    /**
     * @return object
     */
    public function getAuthorAttribute()
    {
        $data=json_decode($this->payload);

        return $data->author;
    }
    
    private function parsePayload()
    {
        if(!$this->data){
            $this->data=json_decode($this->data);
        }
    }
}
