<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
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
            'author_id' =>$increment,
            'subcategory_id' =>$increment,
            'RewardPoints' =>$increment * 10,
            'title' => $this->faker->sentence(3), // Generates a random book title with 3 words
            'brand' => $this->faker->company(), // Generates a random company name
            'image' => "image/products/product-".$increment++.".jpg", // Generates a random book image URL
            'tags' => json_encode($this->faker->words(3)), // Generates an array of 3 random words as tags
            'extax' => 10.00, // Fixed extax value
            'priceInUSD' => $this->faker->randomFloat(2, 5, 100), // Generates a random price between 5 and 100 with 2 decimal places
            'discountPercent' => $this->faker->numberBetween(0, 50), // Generates a random discount percentage between 0 and 50
            'productDescription' => $this->faker->paragraph(), // Generates a random paragraph for the product description
            'manufacturer' => $this->faker->company(), // Generates a random company name for the manufacturer
            'color' => $this->faker->safeColorName(), // Generates a random safe color name
            'productCode' => $this->faker->bothify('??-#####'), // Generates a random product code (e.g., AB-12345)
            'availability' => $this->faker->randomElement(['In Stock', 'Out of Stock', 'Pre-order']), // Generates a random availability status
        ];
    }
}
