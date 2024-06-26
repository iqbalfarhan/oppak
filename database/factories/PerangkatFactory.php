<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Perangkat>
 */
class PerangkatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(3),
            'durasi_pln' => fake()->numberBetween(3, 12),
            'durasi_solar_cell' => fake()->numberBetween(3, 12),
            'durasi_genset' => fake()->numberBetween(3, 12),
        ];
    }
}
