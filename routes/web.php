<?php

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
Route::get('tournament', [Site\IndexController::class, 'tournament'])->name('site.tournament');
Route::get('categories', [Site\IndexController::class, 'categories'])->name('site.categories');
Route::get('category/{categorySlug}', [Site\IndexController::class, 'category'])->name('site.category');
Route::get('category/{categorySlug}/{articleSlug}', [Site\IndexController::class, 'article'])->name('site.article');
Route::get('author/{id}', [Site\IndexController::class, 'author'])->name('site.author');
Route::get('search', [Site\IndexController::class, 'search'])->name('site.search');
Route::get('tag/{tagSlug}', [Site\IndexController::class, 'articlesByTag'])->name('site.articles-by-tag');

Route::post('add-comment', [Site\IndexController::class, 'addComment'])->name('site.add-comment');
Route::post('subscribe', [Site\MailchimpController::class, 'subscribe'])->name('site.subscribe');

Route::get('login', [Site\LoginController::class, 'login'])->name('site.login');
Route::get('policy', [Site\IndexController::class, 'policy'])->name('site.policy');
