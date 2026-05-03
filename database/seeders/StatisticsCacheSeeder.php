<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatisticsCacheSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('statistics_cache')->insert([
            ['stat_key' => 'total_orders_completed',   'stat_value' => '0',  'stat_label' => 'Pesanan Selesai',       'stat_icon' => 'fa-check-circle', 'sort_order' => 1, 'is_active' => 1],
            ['stat_key' => 'total_customers',          'stat_value' => '0',  'stat_label' => 'Pelanggan Terdaftar',   'stat_icon' => 'fa-users',        'sort_order' => 2, 'is_active' => 1],
            ['stat_key' => 'total_service_categories', 'stat_value' => '17', 'stat_label' => 'Kategori Layanan',      'stat_icon' => 'fa-list',         'sort_order' => 3, 'is_active' => 1],
            ['stat_key' => 'years_operating',          'stat_value' => '2',  'stat_label' => 'Tahun Beroperasi',      'stat_icon' => 'fa-calendar',     'sort_order' => 4, 'is_active' => 1],
        ]);
    }
}



