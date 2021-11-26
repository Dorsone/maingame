<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\ViewHistory;
use App\Services\ViewHistoryService;
use Backpack\CRUD\Tests\Unit\Models\Article;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AccountController extends Controller
{
    /**
     * Checking Auth
     * AccountController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * It`s a view of User`s history page
     * @return Application|Factory|View
     */
    public function history()
    {
        return view('gzone.pages.view_history', [
            'histories' => auth()->user()->histories
        ]);
    }

    /**
     * It`s for destroying User`s history
     * @param $articles
     * @param ViewHistoryService $viewHistoryService
     * @return RedirectResponse
     */
    public function destroyHistory(Articles $articles, ViewHistoryService $viewHistoryService)
    {
        $viewHistoryService->deleteHistory($articles, auth()->user()->id);
        return redirect()->route('author.history.index');
    }

    /**
     * Index page of User`s profile
     * @return Application|Factory|View
     */
    public function profile(){
        return view('gzone.pages.user_profile');
    }
}
