<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('mainslides', 'MainSlidesCrudController');
    Route::crud('menu', 'MenuCrudController');
    Route::crud('articlescategories', 'ArticlesCategoriesCrudController');
    Route::crud('articlestags', 'ArticlesTagsCrudController');
    Route::crud('articles', 'ArticlesCrudController');

    Route::group(['prefix' => 'summernote-image'], function () {
        Route::post('upload', ['as' => 'summernote.image.upload', 'uses' => 'SummernoteImageController@upload']);
        Route::post('delete', ['as' => 'summernote.image.delete', 'uses' => 'SummernoteImageController@delete']);
    });

    Route::crud('user', 'UserCrudController');
}); // this should be the absolute last line of this file