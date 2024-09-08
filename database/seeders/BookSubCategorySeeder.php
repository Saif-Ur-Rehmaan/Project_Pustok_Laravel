<?php

namespace Database\Seeders;

use App\Models\BookSubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BookSubCategory::factory()->count(10)->create();
    }
}
