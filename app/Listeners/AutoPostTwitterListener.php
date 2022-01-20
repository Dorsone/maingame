<?php

namespace App\Listeners;

use App\Events\ArticleCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AutoPostTwitterListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ArticleCreatedEvent  $event
     * @return void
     */
    public function handle(ArticleCreatedEvent $event)
    {
        //
    }
}
