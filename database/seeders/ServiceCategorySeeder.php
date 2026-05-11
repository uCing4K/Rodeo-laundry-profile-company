<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceCategorySeeder extends Seeder
{
    public function run(): void
    {

        DB::table('service_categories')->insert([
            ['name' => 'Setrika Saja', 'description' => 'Layanan setrika saja', 'base_price' => 2500, 'service_type_id' => 1],
            ['name' => 'Cuci Komplit', 'description' => 'Layanan cuci lengkap dengan setrika', 'base_price' => 5000, 'service_type_id' => 1],
        ]);
    }
}



