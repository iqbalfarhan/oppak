<?php

namespace Database\Factories;

use App\Models\Laporan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Amf>
 */
class AmfFactory extends Factory
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
            'ruangan_bersih' => fake()->boolean(),
            'engine_bersih' => fake()->boolean(),
            'tegangan' => [
                'R-S' => fake()->randomNumber(2),
                'S-T' => fake()->randomNumber(2),
                'T-R' => fake()->randomNumber(2),
                'R-N' => fake()->randomNumber(2),
                'S-N' => fake()->randomNumber(2),
                'T-N' => fake()->randomNumber(2),
            ],
            'arus' => [
                'R' => fake()->randomNumber(2),
                'S' => fake()->randomNumber(2),
                'T' => fake()->randomNumber(2),
            ],
            'kwh' => fake()->randomNumber(2),
            'jam_jalan_genset' => fake()->randomNumber(2),
        ];
    }
}
