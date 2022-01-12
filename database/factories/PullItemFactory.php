<?php

namespace Database\Factories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

class PullItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $game = Game::query()->inRandomOrder()->first();
        return [
            'name' => $this->faker->word,
            'game_id' => $game->id
        ];
    }
}
