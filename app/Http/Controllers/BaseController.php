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
            'main_menu' => $this->getMenu('top-menu'),
            'bottom_menu' => $this->getMenu('bottom-menu'),
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
     * @param $alias
     * @return mixed
     */
    private function getMenu($alias)
    {
        $menu = Menu::where('alias', $alias)->first();

        if (!$menu) {
            $menu = $this->createMenu($alias);
        }

        return $menu->pages->sortBy('nest_left')->filter(function ($page) {
            return $page->nest_depth === 0 && !$page->is_hidden && !$page->is_disabled;
        });
    }

    /**
     * @param $alias
     * @return static
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
        $areas=Area::isEnabled()->orderByRaw("RAND()")->get();

        return $areas;
    }
}
