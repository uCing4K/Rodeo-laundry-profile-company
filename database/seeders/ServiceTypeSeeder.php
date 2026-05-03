<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceTypeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('service_types')->insert([
            [
                'name'                  => 'Reguler',
                'slug'                  => 'reguler',
                'description'           => 'Layanan standar dengan estimasi selesai sesuai kategori produk',
                'estimated_duration'    => 'Sesuai kategori produk',
                'additional_cost'       => 0.00,
                'additional_cost_note'  => 'Harga standar tanpa biaya tambahan',
                'icon'                  => 'fa-clock',
                'sort_order'            => 1,
                'is_active'             => 1,
            ],
            [
                'name'                  => 'Express 24 Jam',
                'slug'                  => 'express-24-jam',
                'description'           => 'Layanan cepat dengan estimasi selesai dalam 24 jam',
                'estimated_duration'    => '~24 jam',
                'additional_cost'       => 15000.00,
                'additional_cost_note'  => 'Biaya tambahan: +Rp 15.000',
                'icon'                  => 'fa-bolt',
                'sort_order'            => 2,
                'is_active'             => 1,
            ],
            [
                'name'                  => 'Express Same Day',
                'slug'                  => 'express-same-day',
                'description'           => 'Layanan super cepat, selesai di hari yang sama',
                'estimated_duration'    => 'Hari yang sama',
                'additional_cost'       => 10000.00,
                'additional_cost_note'  => 'Biaya tambahan: +Rp 10.000',
                'icon'                  => 'fa-rocket',
                'sort_order'            => 3,
                'is_active'             => 1,
            ],
            [
                'name'                  => 'Express 2 Hari',
                'slug'                  => 'express-2-hari',
                'description'           => 'Layanan express dengan estimasi 2 hari kerja',
                'estimated_duration'    => '2 hari kerja',
                'additional_cost'       => 0.00,
                'additional_cost_note'  => 'Biaya tambahan menyesuaikan',
                'icon'                  => 'fa-shipping-fast',
                'sort_order'            => 4,
                'is_active'             => 1,
            ],
        ]);
    }
}



