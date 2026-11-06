<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Warehouse::create([
            'name' => 'Main Warehouse',
            'location' => 'Kigali Industrial Zone',
            'capacity' => 10000,
            'manager_id' => 2,
        ]);

        \App\Models\Warehouse::create([
            'name' => 'Branch Warehouse',
            'location' => 'Karongi District',
            'capacity' => 5000,
            'manager_id' => 3,
        ]);
    }
}
