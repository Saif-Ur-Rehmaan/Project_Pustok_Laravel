<?php

namespace Database\Factories;

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
        return [
            'user_id'=>$this->faker->numberBetween(1,10),
            'title'=>$this->faker->title(),
            'city'=>$this->faker->city(),
            'contactNumber'=>$this->faker->phoneNumber(),
            'address'=>$this->faker->streetAddress(),
        ];
    }
}
