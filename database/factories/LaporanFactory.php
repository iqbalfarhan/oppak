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
        return [
            'site_id' => fake()->randomElement(Site::pluck('id')),
            'user_id' => fake()->randomElement(User::pluck('id')),
            'tanggal' => date('Y-m-d'),
            'done' => fake()->boolean(),
        ];
    }
}
