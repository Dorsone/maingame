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
use App\Services\AccountService;
use App\Services\IndexingText;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
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
            ->orderByDesc('date')->orderByDesc('id')->limit(5)->get();

        return view('gzone.home', compact('slides', 'categories', 'news'));
    }

    public function tournament()
    {
        return view('gzone.pages.tournament');
    }

    /**
     * @param string|null $slug
     * @return Application|Factory|View
     */
    public function categories(?string $slug = null)
    {
        $categories = ArticlesCategories::with([
            'articles' => function ($q) use ($slug) {
                $q->where('active', 1);
                $q->orderByDesc('date');
                $q->with(['tags']);
                $q->withCount(['comments']);
                if (!is_null($slug)) {
                    $q->whereHas('tags', function ($q) use ($slug) {
                        $q->where('articles_tags.slug', '=', $slug);
                    });
                }
            }
        ])
            ->whereHas('articles', function ($q) use ($slug) {
                if (!is_null($slug)) {
                    $q->whereHas('tags', function ($q) use ($slug) {
                        $q->where('articles_tags.slug', '=', $slug);
                    });
                }
                $q->where('active', 1);
            })
            ->where('active', 1)
            ->orderBy('lft')
            ->get();

        $breadcrumbs = $slug ? $this->getBreadcrumbs(false, false, false, $slug) : $this->getBreadcrumbs(true);

        return view('gzone.pages.categories', compact('categories', 'breadcrumbs'));
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

        if (request()->isMethod('post')) {

            return response([
                'nextUrl' => $articles->nextPageUrl(),
                'html' => view('gzone.partials.ajax.feeds', ['articles' => $articles, 'category' => $category])->render()
            ]);
        }

        $breadcrumbs = $this->getBreadcrumbs($category);

        return view('gzone.pages.category', compact('category', 'articles', 'tags', 'breadcrumbs'));
    }

    public function article($categorySlug, $articleSlug, AccountService $viewHistoryService)
    {
        $category = ArticlesCategories::where('slug', $categorySlug)
            ->where('active', 1)
            ->firstOrFail();

        $article = Articles::where('active', 1)
            ->where('category_id', $category->id)
            ->where('slug', $articleSlug)
            ->withCount(['comments'])
            ->with(['tags', 'user', 'comments'])
            ->firstOrFail();

        $article->views = ($article->views) ? $article->views + 1 : 1;
        $article->saveQuietly();

        $recommendation = Articles::where('active', 1)
            ->where('id', '<>', $article->id)
            ->with(['tags', 'category'])
            ->withCount(['comments'])
            ->orderByDesc('views')
            ->limit(4)
            ->get();

        $breadcrumbs = $this->getBreadcrumbs($category, $article);

        /**
         * Service for adding history
         */
        $viewHistoryService->addHistory($article->id);

        return view('gzone.pages.article', compact('article', 'category', 'breadcrumbs', 'recommendation'));
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
            ->paginate(6);

        $breadcrumbs = $this->getBreadcrumbs();
        $breadcrumbs[] = [
            'title' => $user->name,
            'url' => route('profile.index', ['id' => $user->id]),
            'current' => true
        ];

        if (request()->isMethod('post')) {

            return response([
                'nextUrl' => $articles->nextPageUrl(),
                'html' => view('gzone.partials.ajax.author-articles', ['articles' => $articles])->render()
            ]);
        }

        return view('gzone.pages.author', compact('user', 'articles', 'breadcrumbs'));
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
        ];

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

        return view('gzone.pages.search', ['breadcrumbs' => $breadcrumbs, 'articles' => $resultId]);
    }

    /**
     *
     * @param null|ArticlesCategories $category
     * @param null|Articles $article
     * @return array
     */
    private function getBreadcrumbs($category = null, $article = null, $tag = null, $slug = null, $articles = null): array
    {
        $breadcrumbs = [];

        if ($category or $article) {
            $breadcrumbs[0] = [
                'title' => 'Категории',
                'url' => route('site.categories'),
                'current' => true
            ];
        }

        if($articles){
            $breadcrumbs[0] = [
                'title' => 'Последние новости',
                'url' => route('site.articles'),
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
                'title' => 'Статьи по тегу #' . $tag->name,
                'current' => true
            ];
        }

        if ($slug) {
            $breadcrumbs[0] = [
                'title' => 'Категории',
                'url' => route('site.categories'),
                'current' => false
            ];
            $breadcrumbs[1] = [
                'title' => $slug,
                'url' => route('site.categories'),
                'current' => true
            ];
        }

        return $breadcrumbs;
    }

    /**
     * @return Application|Factory|View
     */
    public function policy()
    {
        return view('gzone.pages.policy');
    }

    /**
     * Articles index page
     * @param string|null $slug
     * @return Application|Factory|View
     */
    public function articles(?string $slug = null) {

        $articles = Articles::where('active', 1)
            ->with('category')
            ->latest()
            ->paginate(1);

        $breadcrumbs = $slug ? $this->getBreadcrumbs(false, false, false, $slug, false) : $this->getBreadcrumbs(false, false, false, false, true);

        return view('gzone.pages.articles', compact('articles', 'breadcrumbs'));
    }
}
