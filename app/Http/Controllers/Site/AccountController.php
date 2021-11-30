<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoverImageRequest;
use App\Models\Articles;
use App\Services\AccountService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

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
     * @param AccountService $viewHistoryService
     * @return RedirectResponse
     */
    public function destroyHistory(Articles $articles, AccountService $viewHistoryService)
    {
        $viewHistoryService->deleteHistory($articles, auth()->user());
        return redirect()->route('author.history.index');
    }

    /**
     * Index page of User`s profile
     * @return Application|Factory|View
     */
    public function profile()
    {
        if(isset(auth()->user()->getMedia('covers')[0])){
            $media = auth()->user()->getMedia('covers')[0];
        }else{
            $media = null;
        }
        return view('gzone.pages.user_profile', [
            'user' => auth()->user(),
            'media' => $media,
        ]);
    }


    /**
     * It`s for editing User`s cover
     * @param CoverImageRequest $request
     * @param AccountService $accountService
     * @return RedirectResponse
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function userCoverStore(CoverImageRequest $request, AccountService $accountService)
    {
        $accountService->storeCover($request);
        return redirect()->route('profile.index');
    }
}

