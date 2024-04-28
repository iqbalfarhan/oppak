<?php

namespace Database\Factories;

use App\Models\Laporan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Baterai>
 */
class BateraiFactory extends Factory
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
            'tegangan' => [
                fake()->randomNumber(),
                fake()->randomNumber(),
                fake()->randomNumber(),
                fake()->randomNumber(),
            ],
            'elektrolit' => fake()->randomElement(['normal', 'diatas maksimum', 'dibawah minimum']),
            'bj_cell' => fake()->randomNumber(),
            'bj_pilot_cell_bank' => [
                fake()->randomNumber(),
                fake()->randomNumber(),
                fake()->randomNumber(),
                fake()->randomNumber(),
            ],
        ];
    }
}
