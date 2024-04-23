<?php

namespace Database\Factories;

use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
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
            'kode' => Str::random(8),
            'progress' => fake()->randomNumber(2),
            'perangkat' => fake()->word(),
            'uraian' => fake()->sentence(),
            'done' => fake()->boolean(),
        ];
    }
}
