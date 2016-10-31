<?php

namespace App\Classes;

use Illuminate\Http\Request;

class User
{
    /**
     *
     */
    public static function isAuth()
    {
        return self::data();
    }

    /**
     *
     */
    public static function data()
    {
        $request = app(Request::class);
        $user = $request->session()->get('user');

        if (!$user) {
            return false;
        }

        return (object) $user;
    }

    /**
     *
     */
    public static function store($data, $social)
    {
        return [
            'full_name' => $data->full_name,
            'email'     => $data->email,
            'social'    => $social,
        ];
    }
}
