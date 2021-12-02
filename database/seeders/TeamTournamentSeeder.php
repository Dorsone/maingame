<?php

namespace Database\Seeders;

use App\Models\TeamTournament;
use Illuminate\Database\Seeder;

class TeamTournamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TeamTournament::factory()->count(50)->create();
    }
}
