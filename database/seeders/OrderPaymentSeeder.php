<?php

namespace Database\Seeders;

use App\Models\OrderPayment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrderPayment::factory()->count(10)->create();
    }
}
