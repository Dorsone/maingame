<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ViewHistory;
use Backpack\CRUD\Tests\Unit\Models\Article;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;

class ViewHistoryController extends Controller
{

    public function index()
    {
        $histories = User::find(1)->histories;
        return view('gzone.pages.view_history', [
            'histories' => $histories,
        ]);
    }

    public function destroy($history_id)
    {
        ViewHistory::where('article_id', '=', $history_id)->delete();

        return redirect()->route('site.view-history.index');
    }
}
