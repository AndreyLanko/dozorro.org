<?php

namespace App\Http\Controllers;

use App\Area;
use App\Components\Seo;
use App\Menu;
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
        $seo = new Seo([]);

        $defaultData = [
            'main_menu' => $this->getTopMenu(),
            'bottom_menu' => $this->getBottomMenu(),
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
    private function getTopMenu()
    {
        $menu = Menu::where('alias', 'top-menu')->first();

        if (!$menu) {
            $menu = $this->createMenu('top-menu');
        }

        return $menu->pages;
    }

    /**
     * @return mixed
     */
    private function getBottomMenu()
    {
        $menu = Menu::where('alias', 'bottom-menu')->first();

        if (!$menu) {
            $menu = $this->createMenu('bottom-menu');
        }

        return $menu->pages;
    }

    /**
     * @param $alias
     */
    private function createMenu($alias)
    {
        $defaultNames = [
            'top-menu' => 'Главное меню',
            'bottom-menu' => 'Нижнее меню'
        ];

        $menu = Menu::create([
            'alias' => $alias,
            'title' => $defaultNames[$alias],
        ]);

        return $menu;
    }

    /**
     * @return mixed
     */
    protected function getAreas()
    {
        return Area::isEnabled()->get();
    }
}
