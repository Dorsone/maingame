<?php
/**
 * Created by Konstantin Potapov.
 * Email: k.m.potapov@mail.ru
 * Date: 19.04.2021 10:25
 */

namespace App\Jobs;

use App\Models\Articles;
use App\Services\IndexingText;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateSearchIndexJob implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $articles;

    public $uniqueFor = 60 * 5;

    public function __construct(Articles $articles)
    {
        $this->articles = $articles;
    }

    public function handle(IndexingText $indexingText)
    {

        $indexingText->updateArticleIndex($this->articles);
    }

    public function uniqueId()
    {
        return $this->articles->id;
    }
}
