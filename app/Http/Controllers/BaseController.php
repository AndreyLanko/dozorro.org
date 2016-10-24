<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{
    /**
     * @param $template
     * @param $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function render($template, $data)
    {
        $defaultData = [
            'main_menu' => $this->getMainMenu(),
        ];

        return view(
            $template,
            array_merge(
                $defaultData,
                $data
            )
        );
    }

    /**
     * @return mixed
     */
    public function getMainMenu()
    {
        $pages = Page::where('type', 1)->get();

        return $pages;
    }
}
