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
     * AccountController constructor.
     * Checking Auth
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('gzone.pages.view_history', [
            'histories' => auth()->user()->histories
        ]);
    }

    /**
     * @param $articles
     * @param ViewHistoryService $viewHistoryService
     * @return RedirectResponse
     */
    public function destroy(Articles $articles, ViewHistoryService $viewHistoryService)
    {
        $viewHistoryService->deleteHistory($articles, auth()->user()->id);
        return redirect()->route('author.history.index');
    }
}
