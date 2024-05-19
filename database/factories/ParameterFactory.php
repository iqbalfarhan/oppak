<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Parameter>
 */
class ParameterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $options = fake()->words(5);
        $type = fake()->randomElement(['range', 'istrue']);

        return [
            'name' => fake()->words(2, true),
            'satuan' => fake()->word(),
            'label' => fake()->sentence(),
            'type' => $type,
            'min' => $type == "range" ? fake()->randomFloat() : null,
            'max' => $type == "range" ? fake()->randomFloat() : null,
            'trueif' => $type == "istrue" ? fake()->randomElement($options) : null,
            'options' => $type == "istrue" ? $options : null,
        ];
    }
}
