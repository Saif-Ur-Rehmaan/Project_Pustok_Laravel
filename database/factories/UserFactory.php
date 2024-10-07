<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
 

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'role_id' => 1, // Example range for role_id
            'image' => $this->faker->imageUrl(200, 200, 'people', true, 'Faker'), // Generates a random image URL
            'displayName' => $this->faker->userName(),
            'firstName' => $this->faker->firstName(),
            'lastName' => $this->faker->lastName(),
            'provider' => $this->faker->randomElement(['google', 'facebook', 'twitter']), // Example providers
            'providerId' => $this->faker->unique()->uuid(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // Fixed password for demonstration
            'remember_token' => \Illuminate\Support\Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
