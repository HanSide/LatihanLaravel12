<?php

namespace Database\Factories;
use App\Models\Classroom;
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
            'classroom_id'    => Classroom::factory(),
            'gender'   => fake()->randomElement(['Male', 'Female']),
            'email'    => fake()->unique()->safeEmail(),
            'address'  => fake()->address(),
            'birthday' => fake()->date(),
        ];
    }
}