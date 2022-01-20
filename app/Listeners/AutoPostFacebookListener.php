<?php

namespace App\Listeners;

use App\Events\ArticleCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class AutoPostFacebookListener
{
    /**
     * Handle the event.
     *
     * @param ArticleCreatedEvent $event
     * @return void
     */
    public function handle(ArticleCreatedEvent $event)
    {
        Log::info($event->article);
    }
}
