<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\Tournament;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamTournamentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $team = Team::query()->inRandomOrder()->first();
        $tournament = Tournament::query()->inRandomOrder()->first();
        $group = $tournament->is_there_group_stage ? $this->faker->randomElement(['A', 'B', 'C']) : null;
        return [
            'team_id' => $team->id,
            'tournament_id' => $tournament->id,
            'is_winner' => $this->faker->randomElement([true, false]),
            'group' => $group
        ];
    }
}
