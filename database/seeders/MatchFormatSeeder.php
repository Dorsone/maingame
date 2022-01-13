<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatchFormatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        MatchFormat::factory()->count(3)->create();

        DB::table('match_formats')->insert([
            [
                'name' => '1v1',
                'description' => '',
                'format' => '',
                'slug' => '1v1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '2v2',
                'description' => '',
                'format' => '',
                'slug' => '2v2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '5v5',
                'description' => '',
                'format' => '',
                'slug' => '5v5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
