<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Admin User',
            'email' => 'josenarame@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        \App\Models\User::create([
            'name' => 'Inventory Manager',
            'email' => 'manager@stock.com',
            'password' => bcrypt('password'),
            'role' => 'manager',
        ]);

        \App\Models\User::create([
            'name' => 'Warehouse Staff',
            'email' => 'staff@stock.com',
            'password' => bcrypt('password'),
            'role' => 'staff',
        ]);
    }
}
