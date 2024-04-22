<?php

namespace Database\Factories;

use App\Models\Site;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tamu>
 */
class TamuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'site_id' => fake()->randomElement(Site::pluck('id')),
            'nama' => fake()->name(),
            'perusahaan' => fake()->company(),
            'keperluan' => fake()->sentence(),
            'tipe_identitas' => fake()->randomElement(['ktp', 'sim']),
            'nomor_identitas' => fake()->randomNumber(),
            'masuk' => fake()->dateTime(),
        ];
    }
}
