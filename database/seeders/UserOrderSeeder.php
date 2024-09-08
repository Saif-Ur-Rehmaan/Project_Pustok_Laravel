<?php

namespace Database\Seeders;

use App\Models\UserOrder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserOrder::factory()->count(10)->create();
    }
}
