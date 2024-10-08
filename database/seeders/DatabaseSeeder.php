<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DealOfTheDay;
use App\Models\OrderNote;
use App\Models\Review;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            RoleSeeder::class,
            UserSeeder::class,  
            UserAddressSeeder::class,  
            BookCategorySeeder::class,  
            BookSubCategorySeeder::class,  
            BookSeeder::class,  
            OrderNoteSeeder::class,  
            UserOrderSeeder::class,  
            OrderReciptSeeder::class,  
            PaymentMethodSeeder::class,  
            OrderPaymentSeeder::class,  
            BlogSeeder::class,  
            BlogCommentSeeder::class,  
            ReviewSeeder::class,  
            CouponSeeder::class,  
            DealOfTheDaySeeder::class,  
        ]);
        
    }
}
