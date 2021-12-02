<?php

namespace Database\Factories;

use App\Models\Match;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class MatchDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $team = Team::query()->inRandomOrder()->first();
        $match = Match::query()->inRandomOrder()->first();
        return [
            'team_id' => $team->id,
            'match_id' => $match->id,
            'is_winner' => $this->faker->randomElement([true, false])
        ];
    }
}
