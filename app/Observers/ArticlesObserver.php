<?php
/**
 * Created by Konstantin Potapov.
 * Email: k.m.potapov@mail.ru
 * Date: 17.04.2021 23:35
 */

namespace App\Observers;

use App\Jobs\UpdateSearchIndexJob;
use App\Models\Articles;
use App\Services\IndexingText;

class ArticlesObserver
{
    private $indexingText;

    public function __construct(IndexingText $indexingText)
    {
        $this->indexingText = $indexingText;
    }

    public function created(Articles $articles)
    {
        UpdateSearchIndexJob::dispatch($articles);
    }

    public function saved(Articles $articles)
    {
        UpdateSearchIndexJob::dispatch($articles);
    }


    public function updated(Articles $articles)
    {
        UpdateSearchIndexJob::dispatch($articles);
    }


    public function deleted(Articles $articles)
    {
        $this->indexingText->deleteArticleIndex($articles);
    }
}
