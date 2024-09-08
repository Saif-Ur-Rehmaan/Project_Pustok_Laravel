<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserRole::create([
            'name'=>'user'
        ]);
        UserRole::create([
            'name'=>'admin'
        ]);
        UserRole::create([
            'name'=>'writer'
        ]);
    }
}
