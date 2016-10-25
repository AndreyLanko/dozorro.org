<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Page;
use App\Seo;
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
        $seo = new Seo([]);

        $defaultData = [
            'main_menu' => $this->getMainMenu(),
            'search_type' => 'tender',
            'seo' => $seo->onRender()
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
        $menu = Menu::where('alias', 'top-menu')->first();

        return $menu->pages;
    }
}
