<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\PurchaseOrder::create([
            'order_number' => 'PO-2026-001',
            'supplier_id' => 1,
            'warehouse_id' => 1,
            'order_date' => '2026-11-01',
            'expected_date' => '2026-11-15',
            'status' => 'received',
            'total_amount' => 1750.00,
        ]);

        \App\Models\PurchaseOrder::create([
            'order_number' => 'PO-2026-002',
            'supplier_id' => 2,
            'warehouse_id' => 2,
            'order_date' => '2026-11-03',
            'expected_date' => '2026-11-20',
            'status' => 'pending',
            'total_amount' => 1200.00,
        ]);
    }
}
