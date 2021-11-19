<?php

use App\Http\Controllers\Site\LoginController;
use App\Http\Controllers\Site\IndexController;
use App\Http\Controllers\Site\MailchimpController;
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

Route::get('/', [IndexController::class, 'index'])->name('site.index');
Route::get('tournament', [IndexController::class, 'tournament'])->name('site.tournament');
Route::get('categories', [IndexController::class, 'categories'])->name('site.categories');
Route::match(['get', 'post'],'category/{categorySlug}', [IndexController::class, 'category'])->name('site.category');
Route::get('category/{categorySlug}/{articleSlug}', [IndexController::class, 'article'])->name('site.article');
Route::get('author/{id}', [IndexController::class, 'author'])->name('site.author');
Route::get('search', [IndexController::class, 'search'])->name('site.search');
Route::get('tag/{tagSlug}', [IndexController::class, 'articlesByTag'])->name('site.articles-by-tag');

Route::post('add-comment', [IndexController::class, 'addComment'])->name('site.add-comment');
Route::post('subscribe', [MailchimpController::class, 'subscribe'])->name('site.subscribe');

\Illuminate\Support\Facades\Auth::routes();
Route::get('login', [LoginController::class, 'showLoginForm'])->name('site.login');
Route::get('policy', [IndexController::class, 'policy'])->name('site.policy');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('send/letter', [LoginController::class, 'sendLetterPage'])->name('send.letter');
Route::post('recovery/letter', [LoginController::class, 'forgotPassword'])->name('recovery.letter');


Route::get('recovery/code', [LoginController::class, 'recoveryCodePage'])->name('recovery.code');