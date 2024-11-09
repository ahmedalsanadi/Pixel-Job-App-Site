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
            'employer_id' => Employer::factory(),
            'title' => $this->faker->jobTitle,
            'description' => $this->faker->paragraphs(3, true), // Generates a 3-sentence job description
            'job_type' => $this->faker->randomElement(['Engineering', 'Marketing', 'Finance', 'Design', 'Operations']),
            'salary' => $this->faker->randomElement(['$50,000 USD', '$90,000 USD', '$150,000 USD']),
            'location' => 'Remote',
            'schedule' => $this->faker->randomElement(['Full Time', 'Part Time']),
            'url' => $this->faker->url,
            'featured' => $this->faker->boolean(20), // 20% chance to be featured
        ];
    }
}
