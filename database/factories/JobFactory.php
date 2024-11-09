<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
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

            'title' => $this->faker->jobTitle,
            'description' => $this->faker->paragraphs(3, true),// Generates a 3-sentence job description
            'salary' => $this->faker->numberBetween(80000, 150000),
            'job_type' => $this->faker->randomElement(['Engineering', 'Marketing', 'Finance', 'Design', 'Operations']),
            'location' => $this->faker->city() . ', ' . $this->faker->state(),
            'featured' => $this->faker->boolean(50), // 50% chance to be featured
            'schedule' => $this->faker->randomElement(['Full Time', 'Part Time']),
            'url' => $this->faker->url,
            'employer_id' => Employer::factory(),
        ];
    }
}
