<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\ViewHistoryService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AccountController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $histories = User::find(1)->histories;
        return view('gzone.pages.view_history', [
            'histories' => $histories,
        ]);
    }

    /**
     * @param $history_id
     * @param ViewHistoryService $viewHistoryService
     * @return RedirectResponse
     */
    public function destroy($history_id, ViewHistoryService $viewHistoryService)
    {
        $viewHistoryService->delHistory($history_id);
        return redirect()->route('author.history.index');
    }
}
