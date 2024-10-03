<?php

namespace Database\Seeders;

use App\Models\DealOfTheDay;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DealOfTheDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DealOfTheDay::factory()->count(10)->create();
    }
}
