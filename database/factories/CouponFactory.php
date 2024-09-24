<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => strtoupper(Str::random(10)), // Random uppercase string as coupon code
            'discount' => $this->faker->randomFloat(2, 5, 50), // Random discount between 5.00 and 50.00
            'type' => $this->faker->randomElement(['fixed', 'percent']), // Randomly choose between 'fixed' or 'percent'
            'expiry_date' => $this->faker->optional()->dateTimeBetween('now', '+1 year'), // Random expiry date or null
        ];
    }
}
