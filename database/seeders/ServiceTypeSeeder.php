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
                'name' => 'Reguler',
                'description' => 'Layanan standar dengan estimasi selesai sesuai kategori produk',
                'estimated_duration' => 'Sesuai kategori produk',
                'additional_cost' => 0.00,
            ],
            [
                'name' => 'Express 24 Jam',
                'description' => 'Layanan cepat dengan estimasi selesai dalam 24 jam',
                'estimated_duration' => '~24 jam',
                'additional_cost' => 15000.00,
            ],
        ]);
    }
}



