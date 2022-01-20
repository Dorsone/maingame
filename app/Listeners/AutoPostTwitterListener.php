<?php

namespace App\Listeners;

use App\Events\ArticleCreatedEvent;
use App\Services\AutoPostingService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AutoPostTwitterListener
{
    /**
     * @var AutoPostingService
     */
    private $autoPostingService;

    /**
     * @param AutoPostingService $autoPostingService
     */
    public function __construct(AutoPostingService $autoPostingService)
    {
        $this->autoPostingService = $autoPostingService;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ArticleCreatedEvent  $event
     * @return void
     */
    public function handle(ArticleCreatedEvent $event)
    {
        $this->autoPostingService->createArticleTwitter($event->article);
    }
}
