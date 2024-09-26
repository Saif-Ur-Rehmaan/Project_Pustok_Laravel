<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentMethod::create([
            'name'=>'Cash On Delivery',
            'status'=>'Allowed'
        ]);
        PaymentMethod::create([
            'name'=>'Paypal',
            'status'=>'Allowed'
        ]);
    }
}
