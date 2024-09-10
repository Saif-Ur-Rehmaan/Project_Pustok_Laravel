<?php

namespace Database\Factories;

use App\Models\OrderRecipt;
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
        static $increment = 1; 
        return [
            'title'=>$this->faker->title(),
            'order_id'=>$increment++,
            'File'=>$this->faker->filePath()
        ];
    }
}
