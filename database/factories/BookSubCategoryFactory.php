<?php

namespace Database\Factories;

use App\Models\BookSubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookSubCategory>
 */
class BookSubCategoryFactory extends Factory
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
            'category_id'=> $increment++,
            'name'=>$this->faker->title()
        ];
    }
}
