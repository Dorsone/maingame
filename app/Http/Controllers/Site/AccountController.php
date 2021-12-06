<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\User;
use App\Services\AccountService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class AccountController extends Controller
{
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
     * Creating bookmarks
     * @param Articles $articles
     * @param AccountService $accountService
     * @return JsonResponse
     */
    public function addBookmark(Articles $articles, AccountService $accountService) {
        $accountService->storeBookmark($articles, auth()->user());
        return response()->json([
            'message' => 'Сохранено!',
        ]);
    }

    /**
     * Deleting bookmarks with API request
     * @param Articles $articles
     * @param AccountService $accountService
     * @return JsonResponse
     */
    public function destroyBookmarkAjax(Articles $articles, AccountService $accountService) {
        $accountService->deleteBookmark($articles, auth()->user());
        return response()->json([
            'message' => 'Удалено!',
        ]);
    }

    /**
     * Basic deleting bookmarks
     * @param Articles $articles
     * @param AccountService $accountService
     * @return RedirectResponse
     */
    public function destroyBookmark(Articles $articles, AccountService $accountService) {
        $accountService->deleteBookmark($articles, auth()->user());
        return redirect()->route('author.bookmark.index');
    }
}

