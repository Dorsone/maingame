<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MatchFormatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word,
            'description' => $this->faker->sentence,
            'format' => $this->faker->randomElement(['Best of 1', 'Best of 3', 'Best of 5']),
            'slug' => Str::slug($this->faker->unique()->word)
        ];
    }
}
