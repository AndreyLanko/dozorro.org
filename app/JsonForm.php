<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
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
     * @var array
     */
    private $comments = [];

    /**
     * @return object
     */
    public function getJsonAttribute()
    {
        if(is_string(json_decode($this->payload)))
        {
            $data=json_decode(json_decode($this->payload));
            $this->payload=json_encode($data, JSON_UNESCAPED_UNICODE);
            $this->save();
        }
        
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
        if (!$this->data) {
            $this->data = json_decode($this->data);
        }
    }

    /**
     * @return mixed
     */
    public function getPayload()
    {
        return json_decode($this->payload);
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return (isset($this->getPayload()->author->uniqueKey))?$this->getPayload()->author->uniqueKey:md5($this->getPayload()->author->email . $this->getPayload()->author->social);
    }

    /**
     * @return Collection
     */
    public function comments()
    {
        if (!$this->comments) {
            $comments = JsonForm::where('schema', 'comment')
                ->where('thread', $this->object_id)
                ->get()
            ;

            $this->comments = $comments;
        }

        return $this->comments;
    }

    public static function getF112Enum($key)
    {
        $data = json_decode(file_get_contents(public_path() . '/sources/forms/F112.json'), true);
    
        return array_get($data, 'properties.userForm.form.1.items.0.titleMap.' . $key);
    }

    public static function getCommentsCount($params = [])
    {
        return JsonForm::
            where('model', '=', 'comment')
            ->byTenderIds(@$params['ids'])
            ->count();
    }

    public static function getReviewsCount($params = [])
    {
        return JsonForm::
            where('model', '!=', 'comment')
            ->byTenderIds(@$params['ids'])
            ->count();
    }

    public function scopebyTenderIds($query, $data)
    {
        if($data)
        {
            return $query->whereIn('tender', $data);
        }
    }
}
