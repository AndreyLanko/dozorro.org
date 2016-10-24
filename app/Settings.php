<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    /**
     * @var string
     */
    protected $table = 'system_settings';

    /**
     * @var
     */
    public static $instance;

    /**
     * @var mixed
     */
    public static $value;

    /**
     * @param $key
     * @return mixed
     */
    public static function instance($key)
    {
        if (!self::$instance) {
            self::$instance = (new static())
                ->where('item', $key)
                ->first()
            ;
        }

        if (self::$instance) {
            self::$value = json_decode(self::$instance->value, 1);
        }

        return (object) self::$value;
    }
}
