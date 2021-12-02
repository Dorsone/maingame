<?php

namespace Database\Seeders;

use App\Models\MatchFormat;
use Illuminate\Database\Seeder;

class MatchFormatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MatchFormat::factory()->count(3)->create();
    }
}
