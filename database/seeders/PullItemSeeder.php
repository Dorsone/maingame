<?php

namespace Database\Seeders;

use App\Models\PullItem;
use Illuminate\Database\Seeder;

class PullItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PullItem::factory()->count(50)->create();
    }
}
