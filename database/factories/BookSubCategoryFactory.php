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
        return [
            'category_id'=> BookSubCategory::count()?BookSubCategory::count():1,// random can miss  any nujmber
            'name'=>$this->faker->title()
        ];
    }
}
