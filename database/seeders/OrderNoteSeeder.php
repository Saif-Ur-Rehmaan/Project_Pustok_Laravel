<?php

namespace Database\Seeders;

use App\Models\OrderNote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderNoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrderNote::factory()->count(10)->create();
    }
}
