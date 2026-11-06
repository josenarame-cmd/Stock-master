<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Product::create([
            'name' => 'Laptop Computer',
            'sku' => 'LAP-001',
            'description' => '15-inch laptop with 8GB RAM',
            'price' => 850.00,
            'category_id' => 1,
        ]);

        \App\Models\Product::create([
            'name' => 'Wireless Mouse',
            'sku' => 'MSE-001',
            'description' => 'Ergonomic wireless mouse',
            'price' => 25.00,
            'category_id' => 1,
        ]);

        \App\Models\Product::create([
            'name' => 'T-Shirt',
            'sku' => 'CLO-001',
            'description' => 'Cotton t-shirt, size L',
            'price' => 15.00,
            'category_id' => 2,
        ]);

        \App\Models\Product::create([
            'name' => 'Jeans',
            'sku' => 'CLO-002',
            'description' => 'Denim jeans, size 32',
            'price' => 45.00,
            'category_id' => 2,
        ]);

        \App\Models\Product::create([
            'name' => 'Notebook A4',
            'sku' => 'OFF-001',
            'description' => '200 pages ruled notebook',
            'price' => 2.50,
            'category_id' => 4,
        ]);
    }
}
