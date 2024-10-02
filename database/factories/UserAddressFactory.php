<?php

namespace Database\Factories;

use App\Models\UserAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserAddress>
 */
class UserAddressFactory extends Factory
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
            'user_id'=>$increment++,
            'title'=>$this->faker->randomElement(['Home',"another Address",'work']),
            'city'=>$this->faker->city(),
            'contactNumber'=>$this->faker->phoneNumber(),
            'address'=>$this->faker->streetAddress(),
        ];
    }
}
