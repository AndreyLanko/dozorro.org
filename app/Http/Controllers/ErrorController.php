<?php

namespace App\Http\Controllers;

class ErrorController extends BaseController
{
    public function notfound()
    {
        return $this->render('errors.404', []);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function systemerror()
    {
        $data = [
            'html' => app('App\Http\Controllers\PageController')->get_html(),
        ];

        return $this->render('errors/500', $data);
    }
}
