<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Services\ViewHistoryService;
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
     * @param $history_id
     * @param ViewHistoryService $viewHistoryService
     * @return RedirectResponse
     */
    public function destroy($history_id, ViewHistoryService $viewHistoryService)
    {
        $viewHistoryService->deleteHistory($history_id);
        return redirect()->route('author.history.index');
    }
}
