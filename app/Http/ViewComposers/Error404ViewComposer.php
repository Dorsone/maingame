<?php
/**
 * Created by Konstantin Potapov.
 * Email: k.m.potapov@mail.ru
 * Date: 16.04.2021 4:10
 */

namespace App\Http\ViewComposers;

use App\Models\Articles;
use Illuminate\View\View;

class Error404ViewComposer
{
    public function compose(View $view)
    {
        $articles = Articles::where('active', 1)
            ->with(['tags', 'category'])
            ->orderByDesc('views')
            ->limit(6)
            ->get();


        $view->with('articles', $articles);
    }
}
