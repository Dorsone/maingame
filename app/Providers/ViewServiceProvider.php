<?php
/**
 * Created by Konstantin Potapov.
 * Email: k.m.potapov@mail.ru
 * Date: 14.04.2021 20:27
 */

namespace App\Providers;

use App\Http\ViewComposers\Error404ViewComposer;
use App\Http\ViewComposers\LayoutViewComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        View::composer('errors::404', Error404ViewComposer::class);
        View::composer('site.layout', LayoutViewComposer::class);
    }
}
