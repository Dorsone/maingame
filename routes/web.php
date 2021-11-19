<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Site;

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
Route::get('categories', [Site\IndexController::class, 'categories'])->name('site.categories');
Route::get('category/{categorySlug}', [Site\IndexController::class, 'category'])->name('site.category');
Route::get('category/{categorySlug}/{articleSlug}', [Site\IndexController::class, 'article'])->name('site.article');
Route::get('author/{id}', [Site\IndexController::class, 'author'])->name('site.author');
Route::get('search', [Site\IndexController::class, 'search'])->name('site.search');
Route::get('tag/{tagSlug}', [Site\IndexController::class, 'articlesByTag'])->name('site.articles-by-tag');

Route::post('add-comment', [Site\IndexController::class, 'addComment'])->name('site.add-comment');
Route::post('subscribe', [Site\MailchimpController::class, 'subscribe'])->name('site.subscribe');

Route::get('entrance', [LoginController::class, 'showLoginForm'])->name('site.entrance');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('register', [RegisterController::class, 'register'])->name('register');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('auth/steam', [AuthController::class, 'redirectToSteam'])->name('auth.steam');
Route::get('auth/steam/handle', [AuthController::class, 'handle'])->name('auth.steam.handle');
Route::get('send/letter', [LoginController::class, 'sendLetterPage'])->name('send.letter');
Route::post('registration/letter', [LoginController::class, 'forgotPassword'])->name('registration.letter');
Route::get('recovery/code', [LoginController::class, 'recoveryCodePage'])->name('recovery.code');