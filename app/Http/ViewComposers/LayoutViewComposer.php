<?php
/**
 * Created by Konstantin Potapov.
 * Email: k.m.potapov@mail.ru
 * Date: 14.04.2021 20:25
 */

namespace App\Http\ViewComposers;

use App\Models\Menu;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class LayoutViewComposer
{
    public function compose(View $view)
    {
        $items = Cache::remember(Menu::CACHE_KEY, config('cache.ttl'), function () {
            return Menu::where('active', 1)->orderBy('lft')->get();
        });

        $view->with('menuItems', $items);
    }
}
