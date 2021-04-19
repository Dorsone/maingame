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
Route::get('categories', [Site\IndexController::class, 'categories'])->name('site.categories');
Route::get('category/{categorySlug}', [Site\IndexController::class, 'category'])->name('site.category');
Route::get('category/{categorySlug}/{articleSlug}', [Site\IndexController::class, 'article'])->name('site.article');
Route::get('author/{id}', [Site\IndexController::class, 'author'])->name('site.author');
Route::get('search', [Site\IndexController::class, 'search'])->name('site.search');

Route::post('add-comment', [Site\IndexController::class, 'addComment'])->name('site.add-comment');
Route::post('subscribe', [Site\MailchimpController::class, 'subscribe'])->name('site.subscribe');
