<?php

namespace Database\Factories;

use App\Models\OrderPayment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderPayment>
 */
class OrderPaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $increment = 1; 
        return [
            'order_id' =>$increment++ ,
            'payment_method_id' => 1,
            'amount' => $this->faker->randomFloat(2, 5, 500), // Random amount between 5 and 500
            'currency' => $this->faker->randomElement(['USD', 'EUR', 'GBP']), // Random currency
            'payment_status' => $this->faker->randomElement(['Pending', 'Completed', 'Failed']),
            'transaction_id' => $this->faker->unique()->uuid(), // Unique UUID for the transaction ID
            'payment_details' => $this->faker->text(), // Random text for payment details
            'paid_at' => $this->faker->dateTimeBetween('-1 year', 'now'), // Random date and time within the last year
        ];
    }
}
