<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $word = $this->faker->unique()->word;
        return [
            'title' => $word,
            'tag' => Str::upper(substr($word, 0, 3))
        ];
    }
}
