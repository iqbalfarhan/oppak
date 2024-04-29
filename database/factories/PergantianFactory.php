<?php

namespace Database\Factories;

use App\Models\Perangkat;
use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pergantian>
 */
class PergantianFactory extends Factory
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
            'perangkat_id' => fake()->randomElement(Perangkat::pluck('id')),
            'tanggal' => fake()->date(),
            'keterangan' => fake()->sentence(),
        ];
    }
}
