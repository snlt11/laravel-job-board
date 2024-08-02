<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;


class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=> fake()->jobTitle(),
            'employer_id'=> Employer::factory(),
            'salary'=> fake()->randomFloat(2, 5000, 200)
        ];
    }
}
