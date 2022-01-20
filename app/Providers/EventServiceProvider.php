<?php

namespace App\Providers;

use App\Events\ArticleCreatedEvent;
use App\Listeners\AutoPostFacebookListener;
use App\Listeners\AutoPostTwitterListener;
use App\Models\Articles;
use App\Observers\ArticlesObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        ArticleCreatedEvent::class => [
            AutoPostFacebookListener::class,
            AutoPostTwitterListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Articles::observe(ArticlesObserver::class);
    }
}
