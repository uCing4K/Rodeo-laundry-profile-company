<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceCategorySeeder extends Seeder
{
    public function run(): void
    {

        DB::table('service_categories')->insert([
            ['id' => 1,  'name' => 'Setrika',         'slug' => 'setrika',         'description' => 'Layanan setrika saja untuk pakaian yang sudah bersih',           'icon' => 'fa-iron',            'type' => 'reguler', 'sort_order' => 1,  'is_active' => 1],
            ['id' => 2,  'name' => 'Cuci Kering',     'slug' => 'cuci-kering',     'description' => 'Layanan cuci kering dan lipat tanpa setrika',                   'icon' => 'fa-wind',            'type' => 'reguler', 'sort_order' => 2,  'is_active' => 1],
            ['id' => 3,  'name' => 'Cuci Setrika',    'slug' => 'cuci-setrika',    'description' => 'Layanan cuci lengkap dengan setrika, paket paling populer',     'icon' => 'fa-shirt',           'type' => 'reguler', 'sort_order' => 3,  'is_active' => 1],
            ['id' => 4,  'name' => 'Selimut',         'slug' => 'selimut',         'description' => 'Cuci selimut berbagai ukuran dari S hingga XXL',                'icon' => 'fa-blanket',         'type' => 'reguler', 'sort_order' => 4,  'is_active' => 1],
            ['id' => 5,  'name' => 'Bedcover',        'slug' => 'bedcover',        'description' => 'Cuci bedcover berbagai ukuran',                                 'icon' => 'fa-bed',             'type' => 'reguler', 'sort_order' => 5,  'is_active' => 1],
            ['id' => 6,  'name' => 'Seprai',          'slug' => 'seprai',          'description' => 'Cuci seprai dan sarung bantal/guling',                          'icon' => 'fa-mattress-pillow', 'type' => 'reguler', 'sort_order' => 6,  'is_active' => 1],
            ['id' => 7,  'name' => 'Karpet',          'slug' => 'karpet',          'description' => 'Cuci karpet dari tipis hingga super tebal',                     'icon' => 'fa-rug',             'type' => 'reguler', 'sort_order' => 7,  'is_active' => 1],
            ['id' => 8,  'name' => 'Boneka',          'slug' => 'boneka',          'description' => 'Cuci boneka berbagai ukuran',                                   'icon' => 'fa-teddy-bear',      'type' => 'reguler', 'sort_order' => 8,  'is_active' => 1],
            ['id' => 9,  'name' => 'Handuk & Jaket',  'slug' => 'handuk-jaket',    'description' => 'Cuci handuk, jaket, dan keset',                                'icon' => 'fa-mitten',          'type' => 'reguler', 'sort_order' => 9,  'is_active' => 1],
            ['id' => 10, 'name' => 'Cuci Sepatu',     'slug' => 'cuci-sepatu',     'description' => 'Cuci sepatu sneakers dan lainnya',                              'icon' => 'fa-shoe-prints',     'type' => 'reguler', 'sort_order' => 10, 'is_active' => 1],
            ['id' => 11, 'name' => 'Gorden',          'slug' => 'gorden',          'description' => 'Cuci gorden normal dan tebal',                                  'icon' => 'fa-window-frame',    'type' => 'reguler', 'sort_order' => 11, 'is_active' => 1],
            ['id' => 12, 'name' => 'Bantal & Guling', 'slug' => 'bantal-guling',   'description' => 'Cuci bantal dan guling',                                       'icon' => 'fa-cloud',           'type' => 'reguler', 'sort_order' => 12, 'is_active' => 1],
            ['id' => 13, 'name' => 'Tas',             'slug' => 'tas',             'description' => 'Cuci tas berbagai ukuran',                                      'icon' => 'fa-bag-shopping',    'type' => 'reguler', 'sort_order' => 13, 'is_active' => 1],
        ]);

        DB::table('service_categories')->insert([
            ['id' => 14, 'name' => 'Atasan & Luaran',  'slug' => 'atasan-luaran',  'description' => 'Cuci premium untuk kaos, kemeja, dan jaket. Proses lebih teliti.',    'icon' => 'fa-vest',     'type' => 'premium', 'sort_order' => 1, 'is_active' => 1],
            ['id' => 15, 'name' => 'Bawahan',          'slug' => 'bawahan',        'description' => 'Cuci premium untuk celana, jeans, dan rok.',                          'icon' => 'fa-socks',    'type' => 'premium', 'sort_order' => 2, 'is_active' => 1],
            ['id' => 16, 'name' => 'Ibadah & Lainnya', 'slug' => 'ibadah-lainnya', 'description' => 'Cuci premium untuk perlengkapan ibadah dan item khusus.',             'icon' => 'fa-mosque',   'type' => 'premium', 'sort_order' => 3, 'is_active' => 1],
            ['id' => 17, 'name' => 'Formal & Gaun',    'slug' => 'formal-gaun',    'description' => 'Cuci premium untuk pakaian formal, dress, jas, dan gaun.',            'icon' => 'fa-user-tie', 'type' => 'premium', 'sort_order' => 4, 'is_active' => 1],
        ]);
    }
}



