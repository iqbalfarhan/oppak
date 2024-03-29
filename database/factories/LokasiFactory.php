<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lokasi>
 */
class LokasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'witel' => fake()->randomElement(['BALIKPAPAN', 'SAMARINDA', 'KALBAR', 'KALTARA', 'KALSEL', 'KALTENG']),
            'name' => fake()->city,
            'type' => fake()->randomElement(['pln', 'solar']),
        ];
    }
}
