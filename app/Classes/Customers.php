<?php

namespace app\Classes;

class Costumers
{

//    private $costumers;

//    public function __construct($costumers)
//    {
//        $this->costumers = file_get_contents(public_path().'/sources/ua/edrpou.json');
//    }

    public static function getCostumerByName($customerName)
    {
        $custumers = json_decode(file_get_contents(public_path().'/sources/ua/edrpou.json'));
        
        $result = array_where($costumers, function ($key, $value) use ($customerName) {
            return !empty($value) && ($value == $customerName);
        });
        
        
//        array_slice()

        return $result;
    }
}