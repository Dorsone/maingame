<?php

namespace Database\Seeders;

use App\Models\MatchDetail;
use Illuminate\Database\Seeder;

class MatchDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MatchDetail::factory()->count(250)->create();
    }
}
