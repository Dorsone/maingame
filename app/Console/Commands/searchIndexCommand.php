<?php
/**
 * Created by Konstantin Potapov.
 * Email: k.m.potapov@mail.ru
 * Date: 26.04.2021 10:14
 */

namespace App\Console\Commands;

use App\Services\IndexingText;
use Illuminate\Console\Command;

class searchIndexCommand extends Command
{
    protected $signature = 're-index';

    protected $description = 'Re index search';

    public function handle()
    {
        $this->info('Start');
        (new IndexingText())->start();
        $this->info('Stop');
    }
}
