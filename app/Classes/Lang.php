<?php

namespace App\Classes;

use Illuminate\Support\Facades\DB;

/**
 * Class Lang
 * @package App\Classes
 */
final class Lang
{
    /**
     * @var array
     */
    private static $locales;

    /**
     * @var string
     */
    private static $defaultLocale;

    /**
     *
     */
    public static function getLocales()
    {
        if (sizeof(self::$locales) < 1) {
            self::$locales = DB::table('rainlab_translate_locales')
                ->where('is_enabled', true)
                ->get()
            ;
        }

        return self::$locales;
    }

    public static function getDefault()
    {
        if (sizeof(self::$locales) < 1) {
            self::getLocales();
        }

        if (!self::$defaultLocale) {
            foreach (self::$locales as $locale) {
                if (!$locale->is_default) {
                    continue;
                }

                self::$defaultLocale = $locale->code;
            }
        }

        return self::$defaultLocale;
    }
}
