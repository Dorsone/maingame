<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SteamController;
use App\Http\Controllers\Site\LoginController;
use App\Http\Controllers\Site;
use App\Http\Controllers\Site\MailchimpController;
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
Route::match(['get', 'post'],'author/{id}', [Site\IndexController::class, 'author'])->name('site.author');
Route::get('search', [Site\IndexController::class, 'search'])->name('site.search');
Route::get('tag/{tagSlug}', [Site\IndexController::class, 'articlesByTag'])->name('site.articles-by-tag');

Route::post('add-comment', [IndexController::class, 'addComment'])->name('site.add-comment');
Route::post('subscribe', [MailchimpController::class, 'subscribe'])->name('site.subscribe');

Auth::routes();
Route::get('login', [LoginController::class, 'showLoginForm'])->name('site.login');
Route::get('policy', [IndexController::class, 'policy'])->name('site.policy');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('send/letter', [LoginController::class, 'sendLetterPage'])->name('send.letter');
Route::post('recovery/letter', [LoginController::class, 'forgotPassword'])->name('recovery.letter');
Route::post('check/recover/{user}', [LoginController::class, 'checkRecoverCode'])->name('check.recoverCode');
Route::post('change/password/{user}', [LoginController::class, 'changePassword'])->name('change.password');

Route::post('register', [RegisterController::class, 'sendLetter'])->name('send.registration.letter');

Route::get('auth/steam', [SteamController::class, 'redirectToSteam'])->name('auth.steam');
Route::get('auth/steam/handle', [SteamController::class, 'handle'])->name('auth.steam.handle');