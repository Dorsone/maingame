<?php

namespace Database\Factories;

use App\Models\Tournament;
use Illuminate\Database\Eloquent\Factories\Factory;

class MatchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $tournament = Tournament::query()->inRandomOrder()->first();
        return [
            'tournament_id' => $tournament->id
        ];
    }
}
