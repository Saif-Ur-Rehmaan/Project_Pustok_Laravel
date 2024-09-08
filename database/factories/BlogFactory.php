<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogFactory>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Writer_User_Id' => $this->faker->numberBetween(1, 10), // Assuming you have 50 users
            'image' => $this->faker->imageUrl(640, 480, 'abstract', true, 'Faker'), // Generates a fake image URL
            'content' => $this->faker->paragraphs(8, true), // Generates 3 paragraphs of content
            'description' => $this->faker->text(200), // Generates a random description up to 200 characters
            'tags' => implode(',', $this->faker->words(5)), // Generates a comma-separated list of 5 tags
        ];
    }
}
