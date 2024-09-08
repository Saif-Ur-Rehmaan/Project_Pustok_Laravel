<?php

namespace Database\Seeders;

use App\Models\OrderRecipt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderReciptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      OrderRecipt::factory()->count(10)->create();
    }
}
