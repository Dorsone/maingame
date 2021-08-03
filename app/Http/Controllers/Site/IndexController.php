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
use App\Models\ArticlesComments;
use App\Models\ArticlesTags;
use App\Models\MainSlides;
use App\Models\Search;
use App\Models\SearchItems;
use App\Models\User;
use App\Services\IndexingText;
use Illuminate\Http\Request;
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
                $q->withCount(['comments']);
            },
        ])
            ->whereHas('articles', function ($q) {
                $q->where('active', 1);
            })
            ->where('active', 1)
            ->orderBy('lft')
            ->get();

        $news = Articles::where('active', 1)
            ->with(['category'])
            ->withCount(['comments'])
            ->orderByDesc('date')->orderByDesc('id')->limit(4)->get();

        return view('site.index', compact('slides', 'categories', 'news'));
    }

    public function categories()
    {
        $categories = ArticlesCategories::with([
            'articles' => function ($q) {
                $q->where('active', 1);
                $q->orderByDesc('date');
                $q->with(['tags']);
                $q->withCount(['comments']);
            }
        ])
            ->whereHas('articles', function ($q) {
                $q->where('active', 1);
            })
            ->where('active', 1)
            ->orderBy('lft')
            ->get();

        $breadcrumbs = $this->getBreadcrumbs(true);

        return view('site.categories', compact('categories', 'breadcrumbs'));
    }

    public function category($categorySlug, Request $request)
    {
        $filterTags = $request->input('tags');
        $sort = $request->input('sort');

        $category = ArticlesCategories::where('slug', $categorySlug)
            ->whereHas('articles', function ($q) {
                $q->where('active', 1);
            })
            ->where('active', 1)
            ->firstOrFail();

        $articlesQuery = Articles::where('category_id', $category->id)
            ->withCount(['comments'])
            ->where('active', 1);

        if ($filterTags && is_array($filterTags)) {
            $articlesQuery->whereHas('tags', function ($q) use ($filterTags) {
                $q->whereIn('slug', $filterTags);
            });
        }

        if ($sort && !empty($sort['col']) && !empty($sort['order'])) {

            if ($sort['order'] == 'asc') {
                $articlesQuery->orderBy($sort['col']);
            } else {
                $articlesQuery->orderByDesc($sort['col']);
            }
        } else {
            $articlesQuery->orderByDesc('date');
        }


        $articlesQuery->with(['tags']);

        $articles = $articlesQuery->paginate(config('settings.paginate_per_page') ?? 9);


        $tags = ArticlesTags::whereHas('articles', function ($q) use ($category) {
            $q->where('active', 1);
            $q->where('category_id', $category->id);
        })->get();

        $breadcrumbs = $this->getBreadcrumbs($category);

        return view('site.category', compact('category', 'articles', 'tags', 'breadcrumbs'));
    }

    public function article($categorySlug, $articleSlug)
    {

        $category = ArticlesCategories::where('slug', $categorySlug)
            ->where('active', 1)
            ->firstOrFail();

        $article = Articles::where('active', 1)
            ->where('category_id', $category->id)
            ->where('slug', $articleSlug)
            ->with(['tags', 'user', 'comments'])
            ->firstOrFail();

        $article->views = ($article->views) ? $article->views + 1 : 1;
        $article->saveQuietly();

        $recommendation = Articles::where('active', 1)
            ->where('id', '<>', $article->id)
            ->with(['tags', 'category'])
            ->orderByDesc('views')
            ->limit(4)
            ->get();

        $breadcrumbs = $this->getBreadcrumbs($category, $article);

        return view('site.article', compact('article', 'category', 'breadcrumbs', 'recommendation'));
    }

    public function articlesByTag($tagSlug, Request $request)
    {
        $tag = ArticlesTags::where('slug', $tagSlug)->firstOrFail();

        $breadcrumbs = $this->getBreadcrumbs(null, null, $tag);


        $articlesQuery = Articles::with(['category', 'tags'])->where('active', 1)->whereHas('tags', function ($q) use ($tag) {
            $q->where('tag_id', $tag->id);
        });

        $sort = $request->input('sort');

        if ($sort && !empty($sort['col']) && !empty($sort['order'])) {

            if ($sort['order'] == 'asc') {
                $articlesQuery->orderBy($sort['col']);
            } else {
                $articlesQuery->orderByDesc($sort['col']);
            }
        } else {
            $articlesQuery->orderByDesc('date');
        }
        $articles = $articlesQuery->paginate(config('settings.paginate_per_page') ?? 9);
        return view('site.articles-by-tag', compact('tag', 'articles', 'breadcrumbs'));
    }

    public function author($id)
    {
        $user = User::findOrFail($id);

        $articles = Articles::where('active', 1)
            ->where('user_id', $user->id)
            ->with(['tags', 'user', 'category'])
            ->paginate(4);

        $breadcrumbs = $this->getBreadcrumbs();
        $breadcrumbs[] = [
            'title' => $user->name,
            'url' => route('site.author', ['id' => $user->id]),
            'current' => true
        ];

        return view('site.author', compact('user', 'articles', 'breadcrumbs'));
    }

    public function addComment(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'comment' => 'required|string',
            'article_id' => 'required|exists:articles,id'
        ]);

        $comment = new ArticlesComments();
        $comment->fill($request->except('_token'));
        $comment->save();

        return response()->json([
            'status' => 'success',
        ]);

    }

    public function search(IndexingText $indexingText, Request $request)
    {
        $breadcrumbs[0] = [
            'title' => 'Поиск',
            'url' => route('site.search'),
            'current' => true
        ];;

        $text = $request->get('q');

        if (!empty($text)):
            $prepareWords = $indexingText->getIndex($text);

            $resultId = [];

            $query = Search::select(['items_id', 'weight', 'text']);
            foreach ($prepareWords as $index => $word) {
                $query->orWhereRaw("MATCH(text) AGAINST(? IN BOOLEAN MODE)", [$word]);
            }

            $preResult = $query->orderBy('weight')->get();

            foreach ($preResult as $item) {
                if (isset($resultId[$item->items_id])) {
                    $resultId[$item->items_id] += (int)$item->weight;
                } else {
                    $resultId[$item->items_id] = (int)$item->weight;
                }
            }
            arsort($resultId);

            $articlesIds = SearchItems::whereIn('id', array_keys($resultId))->get(['id', 'article_id']);

            $resultTmp = Articles::whereIn('id', $articlesIds->pluck('article_id'))
                ->with(['category'])
                ->withCount(['comments'])
                ->get();


            foreach ($resultTmp as $item) {
                $idItem = $articlesIds->where('article_id', $item->id)->first();
                if ($idItem && isset($resultId[$idItem->id])) {
                    $resultId[$item->id] = $item;
                }
            }

            foreach ($resultId as $key => $value) {
                if (is_numeric($value)) {
                    unset($resultId[$key]);
                }
            }

        else:
            $resultId = [];
        endif;

        return view('site.search', ['breadcrumbs' => $breadcrumbs, 'articles' => $resultId]);
    }

    /**
     *
     * @param  null|ArticlesCategories  $category
     * @param  null|Articles  $article
     * @return array
     */
    private function getBreadcrumbs($category = null, $article = null, $tag = null): array
    {
        $breadcrumbs = [];

        if ($category or $article) {
            $breadcrumbs[0] = [
                'title' => 'Категории',
                'url' => route('site.categories'),
                'current' => true
            ];
        }

        if ($category && is_object($category)) {
            $breadcrumbs[1] = [
                'title' => empty($category->breadcrumbs_title) ? $category->title : $category->breadcrumbs_title,
                'current' => true,
                'url' => route('site.category', ['categorySlug' => $category->slug])
            ];

            $breadcrumbs[0]['current'] = false;
        }

        if ($article) {
            $breadcrumbs[2] = [
                'title' => empty($article->breadcrumbs_title) ? $article->title : $article->breadcrumbs_title,
                'current' => true
            ];

            $breadcrumbs[0]['current'] = false;
            $breadcrumbs[1]['current'] = false;
        }

        if ($tag) {
            $breadcrumbs[1] = [
                'title' => 'Статьи по тегу #'.$tag->name,
                'current' => true
            ];
        }

        return $breadcrumbs;
    }
}
