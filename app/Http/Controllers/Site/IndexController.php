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
use App\Models\ArticlesTags;
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
        ])
            ->whereHas('articles', function ($q) {
                $q->where('active', 1);
            })
            ->where('active', 1)
            ->orderBy('lft')
            ->get();

        $news = Articles::where('active', 1)->with(['category'])->orderByDesc('date')->limit(4)->get();

        return view('site.index', compact('slides', 'categories', 'news'));
    }

    public function categories()
    {
        $categories = ArticlesCategories::with([
            'articles' => function ($q) {
                $q->where('active', 1);
                $q->orderByDesc('date');
                $q->with(['tags']);
            }
        ])
            ->whereHas('articles', function ($q) {
                $q->where('active', 1);
            })
            ->where('active', 1)
            ->orderBy('lft')
            ->get();

        $breadcrumbs = $this->getCategoryBreadcrumbs();

        return view('site.categories', compact('categories', 'breadcrumbs'));
    }

    public function category($categorySlug)
    {
        $category = ArticlesCategories::where('slug', $categorySlug)
            ->whereHas('articles', function ($q) {
                $q->where('active', 1);
            })
            ->where('active', 1)
            ->firstOrFail();

        $articles = Articles::where('category_id', $category->id)
            ->where('active', 1)
            ->orderByDesc('date')
            ->with(['tags'])
            ->paginate(config('settings.paginate_per_page') ?? 9);

        $tags = ArticlesTags::whereHas('articles', function ($q) use ($category) {
            $q->where('active', 1);
            $q->where('category_id', $category->id);
        })->get();

        $breadcrumbs = $this->getCategoryBreadcrumbs($category);

        return view('site.category', compact('category', 'articles', 'tags', 'breadcrumbs'));
    }

    public function article($categorySlug, $articleSlug)
    {
    }


    /**
     *
     * @param  null|ArticlesCategories  $category
     * @return array
     */
    private function getCategoryBreadcrumbs($category = null): array
    {
        $breadcrumbs[0] = [
            'title' => 'Категории',
            'url' => route('site.categories'),
            'current' => true
        ];

        if ($category) {
            $breadcrumbs[1] = [
                'title' => empty($category->breadcrumbs_title) ? $category->title : $category->breadcrumbs_title,
                'current' => true
            ];

            $breadcrumbs[0]['current'] = false;
        }

        return $breadcrumbs;
    }
}
