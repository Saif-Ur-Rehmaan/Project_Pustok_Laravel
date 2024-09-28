<?php

namespace Database\Factories;

use App\Models\OrderPayment;
use App\Models\OrderRecipt;
use App\Models\UserOrder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserOrder>
 */
class UserOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $increment = 1; 
        $recNo=$increment++;
        return [
            'user_id' => $recNo, 
            'book_id' => $recNo, 
            'Code' => 'ORDTTOD'.$recNo, 
            'orderStatus' => $this->faker->randomElement(['Pending', 'Processing', 'Shipped', 'Delivered', 'Cancelled']),
            'quantity' => $this->faker->numberBetween(1, 10), // Random quantity between 1 and 10
            'pricePerProduct' => $this->faker->randomFloat(2, 5, 100), // Random price between 5 and 100 with 2 decimal places
            'shippingFee' => $this->faker->randomFloat(2, 0, 20), // Random shipping fee between 0 and 20
            'firstName' => $this->faker->firstName(), // Random first name
            'lastName' => $this->faker->lastName(), // Random last name
            'address' => $this->faker->streetAddress(), // Random street address
            'countryName' => $this->faker->country(), // Random country name
            'cityName' => $this->faker->city(), // Random city name
            'stateName' => $this->faker->state(), // Random state name
            'zipCode' => $this->faker->postcode(), // Random postal code
            'contactNumber' => $this->faker->phoneNumber(), // Random phone number
            'orderNote' => $this->faker->sentence(), // Random sentence for order note
        ];
    }

    public function payments()
    {
        return $this->hasMany(OrderPayment::class, 'order_id');
    }
    public function recipts()
    {
        return $this->hasMany(OrderRecipt::class, 'order_id');
    }
}
