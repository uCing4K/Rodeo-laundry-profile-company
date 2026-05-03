<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySettingSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('company_settings')->insert([
            ['setting_key' => 'company_name',        'setting_value' => 'Rodeo Laundry',           'setting_group' => 'general', 'description' => 'Nama perusahaan'],
            ['setting_key' => 'company_tagline',     'setting_value' => 'Bersih, Cepat, Terpercaya','setting_group' => 'general', 'description' => 'Tagline perusahaan'],
            ['setting_key' => 'company_description', 'setting_value' => 'Rodeo Laundry adalah jasa laundry profesional yang melayani cuci reguler, premium, dan berbagai kebutuhan pencucian lainnya dengan hasil bersih dan tepat waktu.', 'setting_group' => 'general', 'description' => 'Deskripsi singkat perusahaan'],
            ['setting_key' => 'company_founded_year','setting_value' => '2024',                    'setting_group' => 'general', 'description' => 'Tahun berdiri'],
            ['setting_key' => 'company_logo',        'setting_value' => '/assets/images/logo.png', 'setting_group' => 'general', 'description' => 'Path logo perusahaan'],
            ['setting_key' => 'company_favicon',     'setting_value' => '/assets/images/favicon.ico','setting_group' => 'general', 'description' => 'Path favicon'],

            ['setting_key' => 'company_address',     'setting_value' => 'Batu, Sumberejo, Gg. Rodeo',  'setting_group' => 'contact', 'description' => 'Alamat lengkap'],
            ['setting_key' => 'company_city',        'setting_value' => 'Kota Batu',                   'setting_group' => 'contact', 'description' => 'Kota'],
            ['setting_key' => 'company_province',    'setting_value' => 'Jawa Timur',                  'setting_group' => 'contact', 'description' => 'Provinsi'],
            ['setting_key' => 'company_phone',       'setting_value' => '+62 821-4329-7707',           'setting_group' => 'contact', 'description' => 'Nomor telepon utama'],
            ['setting_key' => 'company_whatsapp',    'setting_value' => '6282143297707',               'setting_group' => 'contact', 'description' => 'Nomor WhatsApp (format internasional tanpa +)'],
            ['setting_key' => 'company_email',       'setting_value' => 'info@rodeolaundry.my.id',     'setting_group' => 'contact', 'description' => 'Email perusahaan'],
            ['setting_key' => 'company_domain',      'setting_value' => 'rodeolaundry.my.id',          'setting_group' => 'contact', 'description' => 'Domain website'],
            ['setting_key' => 'company_maps_embed',  'setting_value' => 'https://www.google.com/maps/embed?pb=YOUR_EMBED_CODE_HERE', 'setting_group' => 'contact', 'description' => 'Google Maps embed URL'],
            ['setting_key' => 'company_maps_link',   'setting_value' => 'https://maps.google.com/?q=Sumberejo+Batu+Gg+Rodeo', 'setting_group' => 'contact', 'description' => 'Google Maps direct link'],

            ['setting_key' => 'wa_template_general', 'setting_value' => 'Halo Rodeo Laundry! ðŸ‘‹%0ASaya ingin bertanya tentang layanan laundry.%0A%0ANama: _______', 'setting_group' => 'contact', 'description' => 'Template pesan WA umum'],
            ['setting_key' => 'wa_template_order',   'setting_value' => 'Halo Rodeo Laundry! ðŸ‘‹%0ASaya ingin memesan layanan laundry.%0A%0ANama: _______%0ALayanan: _______%0AAlamat: _______', 'setting_group' => 'contact', 'description' => 'Template pesan WA pemesanan'],

            ['setting_key' => 'social_instagram',    'setting_value' => '', 'setting_group' => 'social', 'description' => 'URL Instagram'],
            ['setting_key' => 'social_facebook',     'setting_value' => '', 'setting_group' => 'social', 'description' => 'URL Facebook'],
            ['setting_key' => 'social_tiktok',       'setting_value' => '', 'setting_group' => 'social', 'description' => 'URL TikTok'],

            ['setting_key' => 'seo_meta_title',       'setting_value' => 'Rodeo Laundry â€” Bersih, Cepat, Terpercaya | Kota Batu', 'setting_group' => 'seo', 'description' => 'Meta title untuk SEO'],
            ['setting_key' => 'seo_meta_description', 'setting_value' => 'Jasa laundry profesional di Kota Batu. Layanan cuci reguler & premium, harga terjangkau, bisa tracking pesanan online. Hubungi kami sekarang!', 'setting_group' => 'seo', 'description' => 'Meta description untuk SEO'],
            ['setting_key' => 'seo_meta_keywords',    'setting_value' => 'laundry batu, laundry kota batu, cuci baju batu, rodeo laundry, laundry terdekat, laundry murah batu', 'setting_group' => 'seo', 'description' => 'Meta keywords'],
            ['setting_key' => 'seo_og_image',         'setting_value' => '/assets/images/og-image.jpg', 'setting_group' => 'seo', 'description' => 'Open Graph image untuk social share'],

            ['setting_key' => 'color_primary',        'setting_value' => '#1E4D8C', 'setting_group' => 'design', 'description' => 'Warna primer (Biru Laut)'],
            ['setting_key' => 'color_accent',         'setting_value' => '#F5821F', 'setting_group' => 'design', 'description' => 'Warna aksen (Oranye Segar)'],
            ['setting_key' => 'color_background',     'setting_value' => '#FFFFFF', 'setting_group' => 'design', 'description' => 'Warna latar (Putih Bersih)'],
            ['setting_key' => 'color_text',           'setting_value' => '#2D2D2D', 'setting_group' => 'design', 'description' => 'Warna teks (Abu Gelap)'],
            ['setting_key' => 'color_secondary_bg',   'setting_value' => '#F5F5F5', 'setting_group' => 'design', 'description' => 'Warna latar sekunder (Abu Terang)'],
            ['setting_key' => 'font_heading',         'setting_value' => 'Poppins',  'setting_group' => 'design', 'description' => 'Font untuk judul'],
            ['setting_key' => 'font_body',            'setting_value' => 'Inter',    'setting_group' => 'design', 'description' => 'Font untuk body text'],
        ]);
    }
}


