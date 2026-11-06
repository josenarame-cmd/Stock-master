<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Stock::create([
            'product_id' => 1,
            'warehouse_id' => 1,
            'quantity' => 50,
            'reorder_level' => 10,
        ]);

        \App\Models\Stock::create([
            'product_id' => 1,
            'warehouse_id' => 2,
            'quantity' => 20,
            'reorder_level' => 5,
        ]);

        \App\Models\Stock::create([
            'product_id' => 2,
            'warehouse_id' => 1,
            'quantity' => 100,
            'reorder_level' => 20,
        ]);

        \App\Models\Stock::create([
            'product_id' => 3,
            'warehouse_id' => 1,
            'quantity' => 200,
            'reorder_level' => 50,
        ]);

        \App\Models\Stock::create([
            'product_id' => 4,
            'warehouse_id' => 2,
            'quantity' => 75,
            'reorder_level' => 15,
        ]);
    }
}
