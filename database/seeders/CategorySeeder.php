<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Category::create([
            'name' => 'Electronics',
            'description' => 'Electronic devices and accessories',
        ]);

        \App\Models\Category::create([
            'name' => 'Clothing',
            'description' => 'Apparel and fashion items',
        ]);

        \App\Models\Category::create([
            'name' => 'Food & Beverages',
            'description' => 'Consumable food items and drinks',
        ]);

        \App\Models\Category::create([
            'name' => 'Office Supplies',
            'description' => 'Stationery and office equipment',
        ]);
    }
}
