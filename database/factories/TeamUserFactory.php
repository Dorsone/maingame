<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $team = Team::query()->inRandomOrder()->with('users')->first();
        $user = User::query()->inRandomOrder()->first();
        return [
            'team_id' => $team->id,
            'user_id' => $user->id,
            'is_reserved' => $team->users()->where('is_reserved', '=', false)->count() > 5,
            'is_capitan' => $team->users()->where('is_capitan', '=', true)->count() !== 1,
            'is_creator' => $team->users()->where('is_creator', '=', true)->count() !== 1,
        ];
    }
}
