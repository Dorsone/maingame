<?php

namespace App\Events;

use App\Models\Articles;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ArticleCreatedEvent
{
    use Dispatchable, SerializesModels;

    public $article;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Articles $article)
    {
        $this->article = $article;
    }
}
