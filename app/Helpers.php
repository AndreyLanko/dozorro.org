<?php

namespace App;

use App\Classes\Lang;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\App;

class Helpers
{
    static $thumbs=[
        'list'=>[456, 312]
    ];
    
    public static function urlize(&$object, $prefix='', $path=false, $switch=false)
    {
        if(!$path) {
            $path='/'.trim(app('request')->path(), '/');
        }

        array_walk($object, function($item) use ($prefix, $path, $switch) {
            if($switch!==false && is_array($prefix)){
                $prefix=$prefix[$item->{$switch}];
            }
            
            $item->url=$prefix.self::url($item->slug);
            $item->isCurrentUrl=$item->url==$path;
        });
    }   

    public static function thumbize(&$object, $image, $type)
    {
        array_walk($object, function($item) use ($image, $type) {
            if(!empty($item->{$image})){
                $width=self::$thumbs[$type][0];
                $height=self::$thumbs[$type][1];
    
                if(empty($item->thumbs)){
                    $item->thumbs=new \StdClass();
                }
    
                if(empty($item->thumbs->{$image})){
                    $item->thumbs->{$image}=new \StdClass();
                }
    
                if(empty($item->thumbs->{$image}->{$type})){
                    $item->thumbs->{$image}->{$type}=new \StdClass();
                }
    
                $item->thumbs->{$image}->{$type}=self::parseImageFolder($item->{$image}->disk_name).'/thumb_' . $item->{$image}->id . '_' . $width . 'x' . $height . '_0_0_crop.' . pathinfo($item->{$image}->disk_name, PATHINFO_EXTENSION);
            }
        });
    }   

    public static function url($slug)
    {
        return '/'.trim($slug, '/');
    }
    
    public static function storage($path='')
    {
        return env('DOMAIN_STATIC').'/uploads/public'.$path;
    }
    
    public static function getStoragePath($image)
    {
        $split=str_split($image, 3);
        $path=self::storage();
        
        for($i=0;$i<3;$i++) {
            $path.='/'.$split[$i];
        }

        $path.='/'.$image;
        
        return $path;        
    }
    
    public static function getUrlByContentType($type)
    {
        switch($type)
        {
            case 1: $url='article'; break;
            case 2: $url='news'; break;
            case 3: $url='article'; break;
        }
        
        return $url;
    }

    public static function parseImagePath($image)
    {
        return self::parseImageFolder($image).'/'.$image;
    }

    public static function parseImageFolder($image)
    {
        $split=str_split($image, 3);
        $path=self::storage();
        
        for($i=0;$i<3;$i++) {
            $path.='/'.$split[$i];
        }
        
        return $path;
    }

    /**
     * @param $news
     */
    public static function getDateTime(&$news)
    {
        foreach($news as $item) {
            $date = new Carbon($item->visible_at);

            $item->date = self::parseDate($date);
            $item->time = self::parseTime($date);
        }
    }

    /**
     * @param $month
     * @return mixed
     */
    public static function getMonthes($month)
    {
        $monthes=[
            'января',
            'февраля',
            'марта',
            'апреля',
            'мая',
            'июня',
            'июля',
            'августа',
            'сентября',
            'октября',
            'ноября',
            'декабря',
        ];

        return $monthes[$month];
    }

    /**
     * @param $date
     * @return Carbon|string
     */
    public static function parseDate($date)
    {
        if (gettype($date) === 'string') {
            $date = new Carbon($date);
        }

        return $date->formatLocalized('%d ').self::getMonthes($date->format('n')-1).$date->formatLocalized(' %Y');
    }

    /**
     * @param $time
     * @return string
     */
    public static function parseTime($time)
    {
        if (gettype($time) === 'string') {
            $time = new Carbon($time);
        }

        return $time->formatLocalized('%H:%M');
    }

    public static function getModelByType($type)
    {
        switch($type)
        {
            case 1:case 3: $modelName=['Perevorot\Content\Models\Article', 'Perevorot\Content\Models\Rewrite']; break;
            case 2: $modelName=['Perevorot\Content\Models\News']; break;
        }

        return $modelName;
    }

    /**
     * @param Collection $pages
     */
    public static function filterActivePages(Collection $pages)
    {
        return $pages->map(function (\App\Page $item) {
            $path = '/' . trim(\Illuminate\Support\Facades\Request::path(), '/');

            $item->setAttribute('active', $item->url === $path);

            return $item;
        });
    }

    /**
     * @param $url
     * @return mixed
     */
    public static function replaceLocales($url)
    {
        $locales = [];

        foreach (Lang::getLocales() as $lang) {
            $locales[] = $lang->code;
        }

        $locales = implode('|', $locales);

        $url = preg_replace('/\/(' . $locales . ')/', '', $url);
        return empty($url) ? '/' : $url;
    }

    /**
     * @param $url
     * @return string
     */
    public static function getLocalizedUrl($url)
    {
        $defaultLocale = Lang::getDefault();
        $locale = App::getLocale();
        $url = trim(trim($url), '/');

        if($locale != $defaultLocale)
            $url = $locale.'/'.$url;

        return '/'.$url;
    }

    /**
     * @param $locale
     * @return string
     */
//    public static function getTranslatedUrl($locale)
//    {
//        $locales = Locale::get(['code']);
//
//        if(!self::$defaultLocale)
//            self::$defaultLocale=\RainLab\Translate\Models\Locale::getDefault();
//
//        $url = Request::path();
//
//        $url = trim(trim($url), '/');
//        $url = preg_replace('/^(ru|en)\/?/', '', $url);
//
//        if($locale!=self::$defaultLocale->code)
//            $url=$locale.'/'.$url;
//
//        return '/'.$url;
//    }
}
