<?php

namespace App\Traits;

use App\Classes\Lang;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

trait ModelTranslation
{
    /**
     *
     */
    public function getTranslations()
    {
        $model = DB::table('rainlab_translate_attributes')
            ->where('locale', App::getLocale())
            ->where('model_id', $this->id)
            ->where('model_type', $this->backendNamespace)
            ->first()
        ;

        if (!$model) {
            return;
        }

        $attributes = json_decode($model->attribute_data);

        foreach ($attributes as $field => $value) {
            $this->{$field} = $value;
        }
    }

    /**
     *
     */
    public function insertTranslations()
    {
        if (App::getLocale() == Lang::getDefault()) {
            return;
        }

        $fields = [];

        foreach ($this->translations as $field) {
            $fields[$field] = $this->{$field};
        }

        $attributes = [
            'locale' => App::getLocale(),
            'model_id' => $this->id,
            'model_type' => $this->backendNamespace,
            'attribute_data' => json_encode($fields),
        ];

        DB::table('rainlab_translate_attributes')
            ->insert($attributes)
        ;
    }
}
