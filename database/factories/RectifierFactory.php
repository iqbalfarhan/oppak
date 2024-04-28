<?php

namespace Database\Factories;

use App\Models\Laporan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rectifier>
 */
class RectifierFactory extends Factory
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
            'catuan_input' => fake()->randomNumber(2),
            'tegangan_output' => fake()->randomNumber(2),
            'arus_output' => fake()->randomNumber(2),
        ];
    }
}
