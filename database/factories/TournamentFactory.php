<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\MatchFormat;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TournamentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $game = Game::query()->inRandomOrder()->first();
        $user = User::query()->inRandomOrder()->first();
        $format = MatchFormat::query()->inRandomOrder()->first();
        return [
            'title' => $this->faker->unique()->word,
            'description' => $this->faker->sentence,
            'is_private' => $this->faker->randomElement([true, false]),
            'prize_type' => $this->faker->word,
            'prize_amount' => $this->faker->word,
            'teams_amount' => $this->faker->numberBetween(10, 25),
            'teams_players_amount' => 5,
            'game_id' => $game->id,
            'start_time' => $this->faker->dateTime,
            'end_time' => $this->faker->dateTime,
            'match_format_id' => $format->id,
            'user_id' => $user->id,
            'is_finished' => $this->faker->randomElement([true, false]),
            'play_off_amount' => 10,
            'is_there_group_stage' => $this->faker->randomElement([true, false])
        ];
    }
}
