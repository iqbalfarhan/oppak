<?php

namespace Database\Factories;

use App\Models\Laporan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Temperatur>
 */
class TemperaturFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'laporan_id' => fake()->randomElement(Laporan::pluck('id')),
            'rectifier' => fake()->randomNumber(2),
            'metro' => fake()->randomNumber(2),
            'transmisi' => fake()->randomNumber(2),
            'gpon' => fake()->randomNumber(2),
        ];
    }
}
