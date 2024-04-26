<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Logticket>
 */
class LogticketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ticket_id' => fake()->randomElement(Ticket::pluck('id')),
            'user_id' => fake()->randomElement(User::pluck('id')),
            'uraian' => fake()->sentence(),
        ];
    }
}
