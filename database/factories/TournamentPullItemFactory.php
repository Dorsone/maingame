<?php

namespace Database\Factories;

use App\Models\PullItem;
use App\Models\Tournament;
use Illuminate\Database\Eloquent\Factories\Factory;

class TournamentPullItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $pull_item = PullItem::query()->inRandomOrder()->first();
        $tournament = Tournament::query()->inRandomOrder()->first();
        return [
            'pull_item_id' => $pull_item->id,
            'tournament_id' => $tournament->id
        ];
    }
}
