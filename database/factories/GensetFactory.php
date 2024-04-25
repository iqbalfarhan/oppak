<?php

namespace Database\Factories;

use App\Models\Laporan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genset>
 */
class GensetFactory extends Factory
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
            'keterangan' => fake()->sentence(),
            'ruangan_bersih' => fake()->boolean(),
            'engine_bersih' => fake()->boolean(),
            'suhu_ruangan' => fake()->randomNumber(2),
            'bbm_utama' => fake()->randomNumber(2),
            'bbm_harian' => fake()->randomNumber(2),
        ];
    }
}
