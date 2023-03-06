<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserWeather>
 */
class UserWeatherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'description' => fake()->name(),
            'wind' => fake()->unique()->numberBetween(5,500),
            'temperature' =>  fake()->unique()->numberBetween(0,100)
        ];
    }
}
