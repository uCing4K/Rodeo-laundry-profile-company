<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('products')->insert([

            ['category_id' => 1, 'name' => 'Setrika Saja', 'slug' => 'setrika-saja', 'price' => 2500.00, 'unit' => '/kg', 'size_variant' => null, 'sort_order' => 1, 'is_active' => 1],

            ['category_id' => 2, 'name' => 'Cuci Kering Lipat', 'slug' => 'cuci-kering-lipat', 'price' => 4000.00, 'unit' => '/kg', 'size_variant' => null, 'sort_order' => 1, 'is_active' => 1],

            ['category_id' => 3, 'name' => 'Cuci Setrika', 'slug' => 'cuci-setrika-reguler', 'price' => 5000.00, 'unit' => '/kg', 'size_variant' => null, 'sort_order' => 1, 'is_active' => 1],

            ['category_id' => 4, 'name' => 'Selimut Ukuran S',   'slug' => 'selimut-s',   'price' => 5000.00,  'unit' => '/pcs', 'size_variant' => 'S',   'sort_order' => 1, 'is_active' => 1],
            ['category_id' => 4, 'name' => 'Selimut Ukuran M',   'slug' => 'selimut-m',   'price' => 8000.00,  'unit' => '/pcs', 'size_variant' => 'M',   'sort_order' => 2, 'is_active' => 1],
            ['category_id' => 4, 'name' => 'Selimut Ukuran L',   'slug' => 'selimut-l',   'price' => 10000.00, 'unit' => '/pcs', 'size_variant' => 'L',   'sort_order' => 3, 'is_active' => 1],
            ['category_id' => 4, 'name' => 'Selimut Ukuran XL',  'slug' => 'selimut-xl',  'price' => 15000.00, 'unit' => '/pcs', 'size_variant' => 'XL',  'sort_order' => 4, 'is_active' => 1],
            ['category_id' => 4, 'name' => 'Selimut Ukuran XXL', 'slug' => 'selimut-xxl', 'price' => 20000.00, 'unit' => '/pcs', 'size_variant' => 'XXL', 'sort_order' => 5, 'is_active' => 1],

            ['category_id' => 5, 'name' => 'Bedcover Ukuran S',   'slug' => 'bedcover-s',   'price' => 13000.00, 'unit' => '/pcs', 'size_variant' => 'S',   'sort_order' => 1, 'is_active' => 1],
            ['category_id' => 5, 'name' => 'Bedcover Ukuran M',   'slug' => 'bedcover-m',   'price' => 15000.00, 'unit' => '/pcs', 'size_variant' => 'M',   'sort_order' => 2, 'is_active' => 1],
            ['category_id' => 5, 'name' => 'Bedcover Ukuran L',   'slug' => 'bedcover-l',   'price' => 18000.00, 'unit' => '/pcs', 'size_variant' => 'L',   'sort_order' => 3, 'is_active' => 1],
            ['category_id' => 5, 'name' => 'Bedcover Ukuran XL',  'slug' => 'bedcover-xl',  'price' => 20000.00, 'unit' => '/pcs', 'size_variant' => 'XL',  'sort_order' => 4, 'is_active' => 1],
            ['category_id' => 5, 'name' => 'Bedcover Ukuran XXL', 'slug' => 'bedcover-xxl', 'price' => 25000.00, 'unit' => '/pcs', 'size_variant' => 'XXL', 'sort_order' => 5, 'is_active' => 1],

            ['category_id' => 6, 'name' => 'Seprai', 'slug' => 'seprai-biasa', 'price' => 5000.00, 'unit' => '/pcs', 'size_variant' => null, 'sort_order' => 1, 'is_active' => 1],
            ['category_id' => 6, 'name' => 'Seprai + Sarung Bantal', 'slug' => 'seprai-sarung-bantal', 'price' => 7000.00, 'unit' => '/pcs', 'size_variant' => null, 'sort_order' => 2, 'is_active' => 1],
            ['category_id' => 6, 'name' => 'Seprai + Sarung Bantal & Guling', 'slug' => 'seprai-sarung-bantal-guling', 'price' => 10000.00, 'unit' => '/pcs', 'size_variant' => null, 'sort_order' => 3, 'is_active' => 1],

            ['category_id' => 7, 'name' => 'Karpet Tipis',       'slug' => 'karpet-tipis',       'price' => 5000.00,  'unit' => '/meter', 'size_variant' => 'Tipis',       'sort_order' => 1, 'is_active' => 1],
            ['category_id' => 7, 'name' => 'Karpet Sedang',      'slug' => 'karpet-sedang',      'price' => 8000.00,  'unit' => '/meter', 'size_variant' => 'Sedang',      'sort_order' => 2, 'is_active' => 1],
            ['category_id' => 7, 'name' => 'Karpet Tebal',       'slug' => 'karpet-tebal',       'price' => 12000.00, 'unit' => '/meter', 'size_variant' => 'Tebal',       'sort_order' => 3, 'is_active' => 1],
            ['category_id' => 7, 'name' => 'Karpet Super Tebal', 'slug' => 'karpet-super-tebal', 'price' => 15000.00, 'unit' => '/meter', 'size_variant' => 'Super Tebal', 'sort_order' => 4, 'is_active' => 1],

            ['category_id' => 8, 'name' => 'Boneka Kecil',  'slug' => 'boneka-kecil',  'price' => 2000.00,  'unit' => '/pcs', 'size_variant' => 'Kecil',  'sort_order' => 1, 'is_active' => 1],
            ['category_id' => 8, 'name' => 'Boneka Sedang', 'slug' => 'boneka-sedang', 'price' => 5000.00,  'unit' => '/pcs', 'size_variant' => 'Sedang', 'sort_order' => 2, 'is_active' => 1],
            ['category_id' => 8, 'name' => 'Boneka Besar',  'slug' => 'boneka-besar',  'price' => 15000.00, 'unit' => '/pcs', 'size_variant' => 'Besar',  'sort_order' => 3, 'is_active' => 1],
            ['category_id' => 8, 'name' => 'Boneka Jumbo',  'slug' => 'boneka-jumbo',  'price' => 25000.00, 'unit' => '/pcs', 'size_variant' => 'Jumbo',  'sort_order' => 4, 'is_active' => 1],

            ['category_id' => 9, 'name' => 'Handuk Kecil',  'slug' => 'handuk-kecil',  'price' => 2000.00,  'unit' => '/pcs', 'size_variant' => 'Kecil',  'sort_order' => 1, 'is_active' => 1],
            ['category_id' => 9, 'name' => 'Handuk Sedang', 'slug' => 'handuk-sedang', 'price' => 5000.00,  'unit' => '/pcs', 'size_variant' => 'Sedang', 'sort_order' => 2, 'is_active' => 1],
            ['category_id' => 9, 'name' => 'Handuk Besar',  'slug' => 'handuk-besar',  'price' => 7000.00,  'unit' => '/pcs', 'size_variant' => 'Besar',  'sort_order' => 3, 'is_active' => 1],
            ['category_id' => 9, 'name' => 'Jaket',         'slug' => 'jaket-reguler', 'price' => 10000.00, 'unit' => '/pcs', 'size_variant' => null,     'sort_order' => 4, 'is_active' => 1],
            ['category_id' => 9, 'name' => 'Keset',         'slug' => 'keset',         'price' => 5000.00,  'unit' => '/pcs', 'size_variant' => null,     'sort_order' => 5, 'is_active' => 1],

            ['category_id' => 10, 'name' => 'Sepatu Kecil',  'slug' => 'sepatu-kecil',  'price' => 10000.00, 'unit' => '/pcs', 'size_variant' => 'Kecil',  'sort_order' => 1, 'is_active' => 1],
            ['category_id' => 10, 'name' => 'Sepatu Normal', 'slug' => 'sepatu-normal', 'price' => 15000.00, 'unit' => '/pcs', 'size_variant' => 'Normal', 'sort_order' => 2, 'is_active' => 1],

            ['category_id' => 11, 'name' => 'Gorden Normal', 'slug' => 'gorden-normal', 'price' => 7000.00,  'unit' => '/kg', 'size_variant' => 'Normal', 'sort_order' => 1, 'is_active' => 1],
            ['category_id' => 11, 'name' => 'Gorden Tebal',  'slug' => 'gorden-tebal',  'price' => 10000.00, 'unit' => '/kg', 'size_variant' => 'Tebal',  'sort_order' => 2, 'is_active' => 1],

            ['category_id' => 12, 'name' => 'Bantal Normal', 'slug' => 'bantal-normal', 'price' => 10000.00, 'unit' => '/pcs', 'size_variant' => null,    'sort_order' => 1, 'is_active' => 1],
            ['category_id' => 12, 'name' => 'Guling Normal',  'slug' => 'guling-normal', 'price' => 10000.00, 'unit' => '/pcs', 'size_variant' => 'Normal', 'sort_order' => 2, 'is_active' => 1],
            ['category_id' => 12, 'name' => 'Guling Tebal',   'slug' => 'guling-tebal',  'price' => 12000.00, 'unit' => '/pcs', 'size_variant' => 'Tebal',  'sort_order' => 3, 'is_active' => 1],

            ['category_id' => 13, 'name' => 'Tas Kecil',  'slug' => 'tas-kecil',  'price' => 5000.00,  'unit' => '/pcs', 'size_variant' => 'Kecil',  'sort_order' => 1, 'is_active' => 1],
            ['category_id' => 13, 'name' => 'Tas Sedang', 'slug' => 'tas-sedang', 'price' => 10000.00, 'unit' => '/pcs', 'size_variant' => 'Sedang', 'sort_order' => 2, 'is_active' => 1],
            ['category_id' => 13, 'name' => 'Tas Besar',  'slug' => 'tas-besar',  'price' => 15000.00, 'unit' => '/pcs', 'size_variant' => 'Besar',  'sort_order' => 3, 'is_active' => 1],
        ]);

        DB::table('products')->insert([

            ['category_id' => 14, 'name' => 'Kaos',        'slug' => 'premium-kaos',        'price' => 15000.00, 'unit' => '/pcs', 'estimated_duration' => '48-72 jam', 'sort_order' => 1, 'is_active' => 1],
            ['category_id' => 14, 'name' => 'Kemeja',      'slug' => 'premium-kemeja',      'price' => 20000.00, 'unit' => '/pcs', 'estimated_duration' => '48-72 jam', 'sort_order' => 2, 'is_active' => 1],
            ['category_id' => 14, 'name' => 'Jaket Tipis', 'slug' => 'premium-jaket-tipis', 'price' => 25000.00, 'unit' => '/pcs', 'estimated_duration' => '48-72 jam', 'sort_order' => 3, 'is_active' => 1],
            ['category_id' => 14, 'name' => 'Jaket Tebal', 'slug' => 'premium-jaket-tebal', 'price' => 30000.00, 'unit' => '/pcs', 'estimated_duration' => '48-72 jam', 'sort_order' => 4, 'is_active' => 1],

            ['category_id' => 15, 'name' => 'Celana Pendek', 'slug' => 'premium-celana-pendek', 'price' => 15000.00, 'unit' => '/pcs', 'estimated_duration' => '48-72 jam', 'sort_order' => 1, 'is_active' => 1],
            ['category_id' => 15, 'name' => 'Celana Panjang','slug' => 'premium-celana-panjang','price' => 20000.00, 'unit' => '/pcs', 'estimated_duration' => '48-72 jam', 'sort_order' => 2, 'is_active' => 1],
            ['category_id' => 15, 'name' => 'Jeans',         'slug' => 'premium-jeans',         'price' => 20000.00, 'unit' => '/pcs', 'estimated_duration' => '48-72 jam', 'sort_order' => 3, 'is_active' => 1],
            ['category_id' => 15, 'name' => 'Rok',           'slug' => 'premium-rok',           'price' => 25000.00, 'unit' => '/pcs', 'estimated_duration' => '48-72 jam', 'sort_order' => 4, 'is_active' => 1],

            ['category_id' => 16, 'name' => 'Hijab',          'slug' => 'premium-hijab',          'price' => 15000.00, 'unit' => '/pcs', 'estimated_duration' => '48-72 jam', 'sort_order' => 1, 'is_active' => 1],
            ['category_id' => 16, 'name' => 'Sajadah',        'slug' => 'premium-sajadah',        'price' => 20000.00, 'unit' => '/pcs', 'estimated_duration' => '48-72 jam', 'sort_order' => 2, 'is_active' => 1],
            ['category_id' => 16, 'name' => 'Mukena SET',     'slug' => 'premium-mukena-set',     'price' => 25000.00, 'unit' => '/pcs', 'estimated_duration' => '48-72 jam', 'sort_order' => 3, 'is_active' => 1],
            ['category_id' => 16, 'name' => 'Baju Renang',    'slug' => 'premium-baju-renang',    'price' => 20000.00, 'unit' => '/pcs', 'estimated_duration' => '48-72 jam', 'sort_order' => 4, 'is_active' => 1],
            ['category_id' => 16, 'name' => 'Handuk Dewasa',  'slug' => 'premium-handuk-dewasa',  'price' => 30000.00, 'unit' => '/pcs', 'estimated_duration' => '48-72 jam', 'sort_order' => 5, 'is_active' => 1],

            ['category_id' => 17, 'name' => 'Dress Anak',   'slug' => 'premium-dress-anak',   'price' => 20000.00, 'unit' => '/pcs', 'estimated_duration' => '48-72 jam', 'sort_order' => 1, 'is_active' => 1],
            ['category_id' => 17, 'name' => 'Dress Dewasa', 'slug' => 'premium-dress-dewasa', 'price' => 30000.00, 'unit' => '/pcs', 'estimated_duration' => '48-72 jam', 'sort_order' => 2, 'is_active' => 1],
            ['category_id' => 17, 'name' => "Baju Syar'i",  'slug' => 'premium-baju-syari',   'price' => 30000.00, 'unit' => '/pcs', 'estimated_duration' => '48-72 jam', 'sort_order' => 3, 'is_active' => 1],
            ['category_id' => 17, 'name' => 'Jas',          'slug' => 'premium-jas',          'price' => 35000.00, 'unit' => '/pcs', 'estimated_duration' => '48-72 jam', 'sort_order' => 4, 'is_active' => 1],
            ['category_id' => 17, 'name' => 'Jas Setelan',  'slug' => 'premium-jas-setelan',  'price' => 50000.00, 'unit' => '/pcs', 'estimated_duration' => '48-72 jam', 'sort_order' => 5, 'is_active' => 1],
        ]);
    }
}



