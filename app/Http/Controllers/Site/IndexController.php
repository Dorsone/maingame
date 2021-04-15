<?php
/**
 * Created by Konstantin Potapov.
 * Email: k.m.potapov@mail.ru
 * Date: 14.04.2021 12:32
 */

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\ArticlesCategories;
use App\Models\MainSlides;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    public function index()
    {
        $slides = Cache::remember(MainSlides::CACHE_KEY, config('cache.ttl'), function () {
            return MainSlides::where('active', 1)->orderBy('lft')->get();
        });
        $categories = ArticlesCategories::with([
            'articles' => function ($q) {
                $q->where('active', 1);
                $q->orderByDesc('date');
                $q->with(['tags']);
            }
        ])->where('active', 1)->orderBy('lft')->get();
        $news = Articles::where('active', 1)->with(['category'])->orderByDesc('date')->limit(4)->get();

        return view('site.index', compact('slides', 'categories', 'news'));
    }

    public function categories()
    {

    }

    public function category($categorySlug)
    {
    }

    public function article($categorySlug, $articleSlug)
    {
    }

}
