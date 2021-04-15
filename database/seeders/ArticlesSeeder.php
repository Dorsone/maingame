<?php
/**
 * Created by Konstantin Potapov.
 * Email: k.m.potapov@mail.ru
 * Date: 15.04.2021 13:57
 */

namespace Database\Seeders;

use App\Models\Articles;
use App\Models\ArticlesCategories;
use App\Models\User;
use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ArticlesCategories::where('active', 1)->get(['id']);
        $users = User::get(['id']);

        foreach ($categories as $category) {
            Articles::factory()
                ->for($category, 'category')
                ->for($users->random(), 'user')
                ->count(10)
                ->create();
        }
    }
}
