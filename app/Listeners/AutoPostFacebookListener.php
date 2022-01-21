<?php

namespace App\Listeners;

use App\Events\ArticleCreatedEvent;
use App\Services\AutoPostingService;
use Facebook\Exceptions\FacebookSDKException;

class AutoPostFacebookListener
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
     * @param ArticleCreatedEvent $event
     * @return void
     * @throws FacebookSDKException
     */
    public function handle(ArticleCreatedEvent $event)
    {
        $this->autoPostingService->createArticleFacebook($event->article);
    }
}
