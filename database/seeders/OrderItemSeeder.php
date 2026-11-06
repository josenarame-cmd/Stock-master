<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\OrderItem::create([
            'purchase_order_id' => 1,
            'product_id' => 1,
            'quantity' => 2,
            'unit_price' => 850.00,
            'subtotal' => 1700.00,
        ]);

        \App\Models\OrderItem::create([
            'purchase_order_id' => 1,
            'product_id' => 2,
            'quantity' => 2,
            'unit_price' => 25.00,
            'subtotal' => 50.00,
        ]);

        \App\Models\OrderItem::create([
            'purchase_order_id' => 2,
            'product_id' => 3,
            'quantity' => 50,
            'unit_price' => 15.00,
            'subtotal' => 750.00,
        ]);

        \App\Models\OrderItem::create([
            'purchase_order_id' => 2,
            'product_id' => 4,
            'quantity' => 10,
            'unit_price' => 45.00,
            'subtotal' => 450.00,
        ]);
    }
}
