<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'     => fake()->name(),
            'grade'    => fake()->randomElement([
                'X PPlG 1', 'X PPLG 2', 'X PPLG 3',
                'XI PPLG 1', 'XI PPLG 2', 'XI PPLG 3',
                'XII PPLG 1', 'XII PPLG 2', 'XII PPLG 3'
            ]),
            'gender'   => fake()->randomElement(['Male', 'Female']),
            'email'    => fake()->unique()->safeEmail(),
            'address'  => fake()->address(),
            'birthday' => fake()->date(),
        ];
    }
}