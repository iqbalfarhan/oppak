<?php

namespace Database\Factories;

use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Insidensial>
 */
class InsidensialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $kategories = [
            'GENSET',
            'RECTIFIER',
            'ATS',
            'AC',
            'GROUNDING',
            'LAMPU',
            'LAIN-LAIN'
        ];

        return [
            'site_id' => fake()->randomElement(Site::pluck('id')),
            'user_id' => fake()->randomElement(User::pluck('id')),
            'kategori' => fake()->randomElement($kategories),
            'uraian' => fake()->sentence(),
        ];
    }
}
