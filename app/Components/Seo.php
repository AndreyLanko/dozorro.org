<?php

namespace App\Components;

use DB;
use App\Helpers;
use App\Settings;
use App\Seo as SeoModel;
use Illuminate\Support\Facades\Request;

class Seo
{
    /**
     * @var
     */
    private $seoData;
    private $seo;
    private $isNotFound;

    /**
     * Seo constructor.
     */
    public function __construct($data, $isNotFound = false)
    {
        $this->seo = Settings::instance('perevorot_seo_settings');
        $this->seoData = $data;
        $this->isNotFound = $isNotFound;
    }

    /**
     * @return Settings|mixed
     */
    public function onRender()
    {
        $url = Request::path();
        $url = '/'.trim($url, '/');

        if ($this->isNotFound) {
            $url = '/404';
        }

        $seo = SeoModel::getUrls($url);

        foreach (['title', 'description', 'keywords', 'canonical', 'og_title', 'og_image', 'og_description'] as $item) {
            $this->setTemplate($seo, $item);
        }

        $seo->meta_tags = '';
        $seo->meta_tags .= $this->seo->additional_tags;
        $seo->og_url=app('url')->full();

        if(empty($seo->og_image)) {
            $seo->og_image=$this->parseOgDefaultImage();
        }

        return $seo;
    }

    /**
     * @param $seo
     * @param $variable
     */
    private function setTemplate($seo, $variable)
    {
        if (isset($seo->{$variable})) {
            $patternDefault = "/\{default\.([0-9A-Za-z\_]+)\}/";
            $this->processParseTemplate($seo, $variable, $patternDefault);
        }
    }

    /**
     * @param $seo
     * @param $variable
     * @param $patternDefault
     */
    private function processParseTemplate($seo, $variable, $patternDefault)
    {
        $paramsDefault = $this->parseDefault($patternDefault, $seo->{$variable});

        $parameters = array_merge((array) $this->seoData, (array) $paramsDefault);

        $regexpSingle = '/(\{[A-Za-z\_]+\})/';
        $regexpDouble = '/(\{[A-Za-z\_]+)\.([A-Za-z\_]+\})/';

        $seo->{$variable} = $this->compileTemplate($regexpSingle, $seo->{$variable}, $parameters);
        $seo->{$variable} = $this->compileTemplate($regexpDouble, $seo->{$variable}, $parameters);
    }

    /**
     * @param $template
     * @param $parameters
     * @return mixed
     */
    private function compileTemplate($pattern, $template, $parameters)
    {
        $matches = [];

        preg_match_all($pattern, $template, $matches);

        foreach($parameters as $key=>$one){
            $parameters[$key]=(array)$one;
        }

        foreach ($matches[0] as $key => $match) {
            if (count($matches) > 2) {
                $first_key = ltrim($matches[1][$key], '{');
                $second_key = rtrim($matches[2][$key], '}');
                $text = array_key_exists($first_key, $parameters)?(array_key_exists($second_key, $parameters[$first_key])?$parameters[$first_key][$second_key]:false):false;
            } else {
                $array_key = rtrim(ltrim($matches[1][$key], '{'), '}');
                $text = array_key_exists($array_key, $parameters)?$parameters[$array_key]:false;
            }

            if (false === $text) {
                continue;
            }

            $template = str_replace($match, $text, $template);
        }

        return $template;
    }

    /**
     * @param $template
     * @return array
     */
    private function parseDefault($pattern, $template)
    {
        $matches = [];

        preg_match_all($pattern, $template, $matches);

        $parameters = [];

        foreach ($matches[1] as $key => $match) {
            $parameters[$match] = html_entity_decode($this->seo->{$match}, ENT_QUOTES);
        }

        return [
            'default' => $parameters
        ];
    }
    
    private function parseOgDefaultImage()
    {
        $image=DB::table('system_files')->where('attachment_type', 'Perevorot\Seo\Models\Settings')->where('field', 'og_image')->first();

        return $image ? Helpers::getStoragePath($image->disk_name) : '';
    }
}
