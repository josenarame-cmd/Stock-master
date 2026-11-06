<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Supplier::create([
            'name' => 'TechSupply Inc.',
            'contact_person' => 'John Smith',
            'email' => 'john@techsupply.com',
            'phone' => '+250788123456',
            'address' => 'Kigali, Rwanda',
        ]);

        \App\Models\Supplier::create([
            'name' => 'Rwanda Textiles Ltd',
            'contact_person' => 'Mary Johnson',
            'email' => 'mary@rwandatextiles.com',
            'phone' => '+250788234567',
            'address' => 'Kigali, Rwanda',
        ]);

        \App\Models\Supplier::create([
            'name' => 'Food distributors',
            'contact_person' => 'Peter Williams',
            'email' => 'peter@fooddist.com',
            'phone' => '+250788345678',
            'address' => 'Kigali, Rwanda',
        ]);
    }
}
