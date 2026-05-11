<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySettingSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('company_settings')->insert([
            [
                'company_name' => 'Rodeo Laundry',
                'phone' => '+62 821-4329-7707',
                'whatsapp_link' => 'https://wa.me/6282143297707',
                'email' => 'info@rodeolaundry.my.id',
                'address' => 'Batu, Sumberejo, Gg. Rodeo',
                'map_embed' => '<iframe src="https://www.google.com/maps/embed?pb=YOUR_EMBED_CODE_HERE"></iframe>',
                'seo_description' => 'Jasa laundry profesional di Kota Batu. Layanan cuci reguler & premium, harga terjangkau, bisa tracking pesanan online. Hubungi kami sekarang!',
            ]
        ]);
    }
}


