<?php

namespace Database\Seeders;

use App\Models\TournamentPullItem;
use Illuminate\Database\Seeder;

class TournamentPullItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TournamentPullItem::factory()->count(100)->create();
    }
}
