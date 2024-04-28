<?php

namespace Database\Factories;

use App\Models\Genset;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bateraistarter>
 */
class BateraistarterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'genset_id' => fake()->randomElement(Genset::pluck('id')),
            'tegangan' => fake()->randomNumber(2),
            'bj_cell' => fake()->randomNumber(2),
            'bj_pilot_cell' => fake()->randomNumber(2),
            'elektrolit' => fake()->randomNumber(2),
            'kencang' => fake()->boolean(),
        ];
    }
}
