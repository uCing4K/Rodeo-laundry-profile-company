<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SampleDataSeeder extends Seeder
{
    
    public function run(): void
    {

        DB::table('customers')->insert([
            ['name' => 'Pelanggan Walk-In', 'phone' => null, 'customer_type' => 'personal', 'business_name' => null, 'total_orders' => 0, 'is_active' => 1],
            ['name' => 'Erick Catering',    'phone' => null, 'customer_type' => 'business', 'business_name' => 'Erick Catering', 'total_orders' => 0, 'is_active' => 1],
            ['name' => 'Villa Aster',       'phone' => null, 'customer_type' => 'business', 'business_name' => 'Villa Aster',    'total_orders' => 0, 'is_active' => 1],
        ]);

        DB::table('orders')->insert([
            [
                'order_number'    => 'RODEO-20260303-0001',
                'tracking_token'  => 'TRK-abc123def456',
                'customer_id'     => 1,
                'customer_name'   => 'Pelanggan Walk-In',
                'customer_phone'  => null,
                'service_type_id' => 1,
                'status'          => 'processing',
                'total_items'     => 1,
                'subtotal'        => 15000.00,
                'additional_cost' => 0.00,
                'discount'        => 0.00,
                'total_price'     => 15000.00,
                'payment_status'  => 'unpaid',
                'notes'           => 'Order contoh untuk testing fitur tracking',
                'estimated_done_at' => '2026-03-05 17:00:00',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
        ]);

        DB::table('order_items')->insert([
            [
                'order_id'     => 1,
                'product_id'   => 3,
                'product_name' => 'Cuci Setrika',
                'quantity'     => 3,
                'unit'         => '/kg',
                'unit_price'   => 5000.00,
                'subtotal'     => 15000.00,
                'created_at'   => now(),
            ],
        ]);
    }
}



