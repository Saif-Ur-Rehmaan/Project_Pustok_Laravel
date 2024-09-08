<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderPayment>
 */
class OrderPaymentfactoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => $this->faker->numberBetween(1, 10), // Adjust according to your actual range of order IDs
            'payment_method' => $this->faker->randomElement(['Credit Card', 'PayPal', 'Bank Transfer', 'Cash']),
            'amount' => $this->faker->randomFloat(2, 5, 500), // Random amount between 5 and 500
            'currency' => $this->faker->randomElement(['USD', 'EUR', 'GBP']), // Random currency
            'payment_status' => $this->faker->randomElement(['Pending', 'Completed', 'Failed']),
            'transaction_id' => $this->faker->unique()->uuid(), // Unique UUID for the transaction ID
            'payment_details' => $this->faker->text(), // Random text for payment details
            'paid_at' => $this->faker->dateTimeBetween('-1 year', 'now'), // Random date and time within the last year
        ];
    }
}
