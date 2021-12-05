<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoverImageRequest;
use App\Models\Articles;
use App\Models\User;
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
     * @param AccountService $accountService
     * @return RedirectResponse
     */
    public function destroyHistory(Articles $articles, AccountService $accountService)
    {
        $accountService->deleteHistory($articles, auth()->user());
        return redirect()->route('author.history.index');
    }

    /**
     * Index page of User`s profile
     * @return Application|Factory|View
     */
    public function profile()
    {
        $cover = auth()->user()->getMedia(User::COVER_IMAGE_COLLECTION)->first();
        return view('gzone.pages.user_profile', [
            'user' => auth()->user(),
            'cover' => $cover ? $cover->getUrl() : '',
        ]);
    }


    /**
     * It`s for editing User`s cover
     * @param AccountService $accountService
     * @param User $user
     * @return RedirectResponse
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function userCoverStore(AccountService $accountService, User $user)
    {
        $accountService->storeCover($user);
        return redirect()->route('profile.index');
    }

    /**
     * Index page of User`s page
     * @return Application|Factory|View
     */
    public function bookmarks() {
        return view('gzone.pages.bookmarks', [
            'bookmarks' => auth()->user()->bookmarks,
            'articles' => Articles::latest()->take(3)->get(),
        ]);
    }

    /**
     * Deleting Bookmark
     * @param Articles $articles
     * @param AccountService $accountService
     * @return RedirectResponse
     */
    public function destroyBookmark(Articles $articles, AccountService $accountService) {
        $accountService->deleteBookmark($articles, auth()->user());
        return redirect()->route('author.bookmarks.index');
    }
}

