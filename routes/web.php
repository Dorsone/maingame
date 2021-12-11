<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SteamController;
use App\Http\Controllers\Site\LoginController;
use App\Http\Controllers\Site\AccountController;
use App\Http\Controllers\Site;
use App\Http\Controllers\Site\MailchimpController;
use App\Http\Controllers\Site\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Site\IndexController::class, 'index'])->name('site.index');
Route::get('tournament', [Site\IndexController::class, 'tournament'])->name('site.tournament');
Route::get('categories/{slug?}', [Site\IndexController::class, 'categories'])->name('site.categories');
Route::match(['get', 'post'],'category/{categorySlug}', [Site\IndexController::class, 'category'])->name('site.category');
Route::get('category/{categorySlug}/{articleSlug}', [Site\IndexController::class, 'article'])->name('site.article');
Route::get('search', [Site\IndexController::class, 'search'])->name('site.search');
Route::get('tag/{tagSlug}', [Site\IndexController::class, 'articlesByTag'])->name('site.articles-by-tag');

Route::post('add-comment', [Site\IndexController::class, 'addComment'])->name('site.add-comment');
Route::post('subscribe', [MailchimpController::class, 'subscribe'])->name('site.subscribe');

Auth::routes();
Route::get('login', [LoginController::class, 'showLoginForm'])->name('site.login');
Route::get('policy', [Site\IndexController::class, 'policy'])->name('site.policy');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('send/letter', [LoginController::class, 'sendLetterPage'])->name('send.letter');
Route::post('recovery/letter', [LoginController::class, 'forgotPassword'])->name('recovery.letter');
Route::post('check/recover/{user}', [LoginController::class, 'checkRecoverCode'])->name('check.recoverCode');
Route::post('change/password/{user}', [LoginController::class, 'changePassword'])->name('change.password');

Route::post('register', [RegisterController::class, 'sendLetter'])->name('send.registration.letter');

Route::get('auth/steam', [SteamController::class, 'redirectToSteam'])->name('auth.steam');
Route::get('auth/steam/handle', [SteamController::class, 'handle'])->name('auth.steam.handle');

/**
 * Author routes
 */
Route::prefix('author')->middleware('auth')->name('author.')->group(function () {
    /**
     * Bookmark routes
     */
    Route::group(['prefix' => 'bookmark', 'as' => 'bookmark.'], function () {
        Route::get('', [AccountController::class, 'bookmarks'])->name('index');
        Route::put('store/{articles}', [AccountController::class, 'addBookmark'])->name('store');
        Route::delete('ajax/{articles}', [AccountController::class, 'destroyBookmarkAjax'])->name('ajax.delete');
        Route::delete('{articles}', [AccountController::class, 'destroyBookmark'])->name('delete');
    });
    /**
     * History routes
     */
    Route::group(['prefix' => 'history', 'as' => 'history.'], function () {
        Route::get('', [AccountController::class, 'history'])->name('index');
        Route::delete('{articles}', [AccountController::class, 'destroyHistory'])->name('delete');
    });

    Route::match(['get', 'post'],'{id}', [Site\IndexController::class, 'author'])->name('index');
});
Route::prefix('profile')->middleware('auth')->name('profile.')->group(function () {
    Route::get('settings', [UserController::class, 'settings'])->name('settings');
    Route::post('settings', [UserController::class, 'update'])->name('update');
    Route::post('file', [UserController::class, 'addFile'])->name('add.file');
    Route::delete('file/delete/{media}', [UserController::class, 'deleteFile'])->name('delete.file');
    Route::put('change/email', [UserController::class, 'changeEmail'])->name('change.email');
    Route::put('change/password', [UserController::class, 'changePassword'])->name('change.password');
    Route::delete('delete', [UserController::class, 'destroy'])->name('delete');
    Route::get('', [AccountController::class, 'profile'])->name('index');
    Route::put('/cover/store/{user}', [AccountController::class, 'userCoverStore'])->name('cover.store');
});
