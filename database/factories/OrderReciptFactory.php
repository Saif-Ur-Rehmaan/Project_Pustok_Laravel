<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderRecipt>
 */
class OrderReciptFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'File'=>$this->faker->file(storage_path('app/public/OrderRecipts'),storage_path('app/public/temp'))
        ];
    }
}
