<?php

namespace Database\Factories;

use App\Models\Laporan;
use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Laporan>
 */
class LaporanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tanggal = implode("-", [
            2024,
            date('M'),
            rand(1, 30)
        ]);

        return [
            'site_id' => fake()->randomElement(Site::pluck('id')),
            'user_id' => fake()->randomElement(User::pluck('id')),
            'tanggal' => $tanggal,
            'done' => fake()->boolean(),
        ];
    }
}
