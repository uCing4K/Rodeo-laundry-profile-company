<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageContentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('page_contents')->insert([

            ['page' => 'home', 'section' => 'hero', 'content_key' => 'home_hero_title', 'content_value' => 'Bersih, Cepat, Terpercaya', 'content_type' => 'text', 'description' => 'Judul utama hero section'],
            ['page' => 'home', 'section' => 'hero', 'content_key' => 'home_hero_subtitle', 'content_value' => 'Layanan laundry profesional di Kota Batu. Cuci reguler & premium dengan harga terjangkau dan bisa tracking online!', 'content_type' => 'text', 'description' => 'Subtitle hero section'],
            ['page' => 'home', 'section' => 'hero', 'content_key' => 'home_hero_cta_primary', 'content_value' => 'Lihat Layanan', 'content_type' => 'text', 'description' => 'Teks tombol CTA utama'],
            ['page' => 'home', 'section' => 'hero', 'content_key' => 'home_hero_cta_secondary', 'content_value' => 'Hubungi Kami', 'content_type' => 'text', 'description' => 'Teks tombol CTA sekunder'],
            ['page' => 'home', 'section' => 'hero', 'content_key' => 'home_hero_image', 'content_value' => '/assets/images/hero-bg.jpg', 'content_type' => 'image', 'description' => 'Gambar latar hero section'],

            ['page' => 'home', 'section' => 'keunggulan', 'content_key' => 'home_keunggulan_items', 'content_value' => '[{"icon":"fa-tag","title":"Harga Terjangkau","desc":"Mulai dari Rp 2.500/kg untuk layanan setrika"},{"icon":"fa-bolt","title":"Proses Cepat","desc":"Tersedia layanan Express Same Day dan 24 Jam"},{"icon":"fa-search","title":"Tracking Online","desc":"Pantau status pesanan Anda secara real-time"},{"icon":"fa-shield-alt","title":"Terpercaya","desc":"Setiap item dijaga dan dicatat dengan baik"}]', 'content_type' => 'json', 'description' => 'Data keunggulan (JSON array)'],

            ['page' => 'home', 'section' => 'cara_kerja', 'content_key' => 'home_cara_kerja_items', 'content_value' => '[{"step":1,"icon":"fa-box","title":"Antar Cucian","desc":"Antar cucian Anda ke outlet kami atau hubungi untuk layanan jemput"},{"step":2,"icon":"fa-sync-alt","title":"Proses Cuci","desc":"Tim kami memproses cucian dengan teliti sesuai jenis layanan"},{"step":3,"icon":"fa-check-circle","title":"Ambil / Dikirim","desc":"Cucian selesai! Ambil di outlet atau kami kirim ke alamat Anda"}]', 'content_type' => 'json', 'description' => 'Langkah cara kerja (JSON array)'],

            ['page' => 'home', 'section' => 'cta_bottom', 'content_key' => 'home_cta_title', 'content_value' => 'Siap Mencuci Pakaian Anda?', 'content_type' => 'text', 'description' => 'Judul CTA bawah'],
            ['page' => 'home', 'section' => 'cta_bottom', 'content_key' => 'home_cta_subtitle', 'content_value' => 'Hubungi kami sekarang atau cek status pesanan Anda dengan mudah', 'content_type' => 'text', 'description' => 'Subtitle CTA bawah'],

            ['page' => 'about', 'section' => 'story', 'content_key' => 'about_story_title', 'content_value' => 'Cerita Kami', 'content_type' => 'text', 'description' => 'Judul sejarah perusahaan'],
            ['page' => 'about', 'section' => 'story', 'content_key' => 'about_story_content', 'content_value' => 'Rodeo Laundry berdiri dengan visi sederhana: memberikan layanan laundry yang bersih, cepat, dan terpercaya untuk masyarakat Kota Batu dan sekitarnya. Berawal dari usaha kecil di Sumberejo, Gg. Rodeo, kami terus berkembang melayani tidak hanya pelanggan rumah tangga, tetapi juga mitra bisnis seperti villa, penginapan, dan jasa katering.', 'content_type' => 'html', 'description' => 'Cerita/sejarah perusahaan'],
            ['page' => 'about', 'section' => 'vision', 'content_key' => 'about_vision', 'content_value' => 'Menjadi penyedia layanan laundry terpercaya dan modern di Kota Batu yang mengutamakan kebersihan, ketepatan waktu, dan kepuasan pelanggan.', 'content_type' => 'text', 'description' => 'Visi perusahaan'],
            ['page' => 'about', 'section' => 'mission', 'content_key' => 'about_mission', 'content_value' => 'Memberikan layanan laundry berkualitas tinggi dengan harga terjangkau, didukung teknologi tracking modern untuk kemudahan pelanggan.', 'content_type' => 'text', 'description' => 'Misi perusahaan'],
            ['page' => 'about', 'section' => 'values', 'content_key' => 'about_values_items', 'content_value' => '[{"icon":"fa-sparkles","title":"Bersih","desc":"Hasil cucian bersih dan wangi"},{"icon":"fa-clock","title":"Tepat Waktu","desc":"Pesanan selesai sesuai estimasi"},{"icon":"fa-smile","title":"Ramah Pelanggan","desc":"Pelayanan hangat dan profesional"},{"icon":"fa-handshake","title":"Terpercaya","desc":"Setiap item dijaga dengan baik"}]', 'content_type' => 'json', 'description' => 'Nilai perusahaan (JSON array)'],

            ['page' => 'services', 'section' => 'header', 'content_key' => 'services_title', 'content_value' => 'Layanan & Harga', 'content_type' => 'text', 'description' => 'Judul halaman layanan'],
            ['page' => 'services', 'section' => 'header', 'content_key' => 'services_subtitle', 'content_value' => 'Kami menyediakan berbagai layanan laundry untuk kebutuhan Anda, dari cuci reguler hingga premium.', 'content_type' => 'text', 'description' => 'Subtitle halaman layanan'],
            ['page' => 'services', 'section' => 'premium_note', 'content_key' => 'services_premium_note', 'content_value' => 'Proses lebih teliti, estimasi 48â€“72 jam. Cocok untuk pakaian formal dan berbahan khusus.', 'content_type' => 'text', 'description' => 'Catatan layanan premium'],

            ['page' => 'tracking', 'section' => 'header', 'content_key' => 'tracking_title', 'content_value' => 'Cek Status Pesanan', 'content_type' => 'text', 'description' => 'Judul halaman tracking'],
            ['page' => 'tracking', 'section' => 'header', 'content_key' => 'tracking_subtitle', 'content_value' => 'Masukkan nomor order atau token tracking Anda untuk melihat status pesanan secara real-time.', 'content_type' => 'text', 'description' => 'Subtitle halaman tracking'],
            ['page' => 'tracking', 'section' => 'header', 'content_key' => 'tracking_placeholder', 'content_value' => 'Masukkan nomor order (cth: RODEO-20260301-0001) atau token tracking', 'content_type' => 'text', 'description' => 'Placeholder input tracking'],

            ['page' => 'contact', 'section' => 'header', 'content_key' => 'contact_title', 'content_value' => 'Hubungi Kami', 'content_type' => 'text', 'description' => 'Judul halaman kontak'],
            ['page' => 'contact', 'section' => 'header', 'content_key' => 'contact_subtitle', 'content_value' => 'Punya pertanyaan atau ingin memesan layanan? Jangan ragu untuk menghubungi kami.', 'content_type' => 'text', 'description' => 'Subtitle halaman kontak'],

            ['page' => 'faq', 'section' => 'header', 'content_key' => 'faq_title', 'content_value' => 'Pertanyaan yang Sering Diajukan', 'content_type' => 'text', 'description' => 'Judul halaman FAQ'],
            ['page' => 'faq', 'section' => 'header', 'content_key' => 'faq_subtitle', 'content_value' => 'Temukan jawaban untuk pertanyaan umum seputar layanan Rodeo Laundry.', 'content_type' => 'text', 'description' => 'Subtitle halaman FAQ'],
        ]);
    }
}



