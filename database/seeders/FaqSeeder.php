<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('faq')->insert([
            ['question' => 'Berapa lama waktu proses pencucian?', 'answer' => 'Untuk layanan reguler, waktu proses bervariasi tergantung jenis layanan. Cuci setrika biasanya memakan waktu 2-3 hari kerja. Kami juga menyediakan layanan Express 24 Jam dan Same Day untuk kebutuhan mendesak dengan biaya tambahan.', 'category' => 'Layanan', 'icon' => 'fa-clock', 'sort_order' => 1, 'is_active' => 1],
            ['question' => 'Apakah ada layanan antar-jemput?', 'answer' => 'Saat ini kami melayani antar-jemput untuk area Kota Batu dan sekitarnya. Silakan hubungi kami via WhatsApp untuk informasi lebih lanjut mengenai jangkauan area dan biaya antar-jemput.', 'category' => 'Layanan', 'icon' => 'fa-truck', 'sort_order' => 2, 'is_active' => 1],
            ['question' => 'Bagaimana cara melacak status laundry saya?', 'answer' => 'Anda bisa melacak status pesanan melalui halaman "Cek Status Order" di website kami. Cukup masukkan nomor order (format: RODEO-YYYYMMDD-XXXX) atau token tracking yang diberikan saat pemesanan.', 'category' => 'Tracking', 'icon' => 'fa-search', 'sort_order' => 3, 'is_active' => 1],
            ['question' => 'Apa bedanya layanan reguler dan premium?', 'answer' => 'Layanan reguler adalah cuci standar yang cocok untuk pakaian sehari-hari. Layanan premium menggunakan proses yang lebih teliti dan hati-hati, cocok untuk pakaian formal, berbahan khusus, atau item yang membutuhkan perawatan ekstra. Estimasi waktu premium adalah 48-72 jam.', 'category' => 'Layanan', 'icon' => 'fa-star', 'sort_order' => 4, 'is_active' => 1],
            ['question' => 'Apakah bisa bayar nanti (hutang/kredit)?', 'answer' => 'Kami menerima pembayaran tunai dan transfer. Untuk pelanggan tetap atau pelanggan bisnis (B2B), kami menyediakan opsi pembayaran yang bisa didiskusikan langsung. Silakan hubungi kami untuk informasi lebih lanjut.', 'category' => 'Pembayaran', 'icon' => 'fa-credit-card', 'sort_order' => 5, 'is_active' => 1],
            ['question' => 'Bagaimana jika pakaian saya rusak atau hilang?', 'answer' => 'Kami sangat menjaga kualitas dan keamanan setiap item yang masuk. Jika terjadi kerusakan atau kehilangan yang disebabkan oleh kelalaian kami, kami akan bertanggung jawab penuh. Setiap item dicatat dan diperiksa saat penerimaan dan pengembalian.', 'category' => 'Garansi', 'icon' => 'fa-shield-alt', 'sort_order' => 6, 'is_active' => 1],
            ['question' => 'Apakah melayani order dalam jumlah besar (villa, penginapan, catering)?', 'answer' => 'Ya! Kami melayani pelanggan bisnis (B2B) seperti villa, hotel, penginapan, kos-kosan, dan katering. Kami menawarkan harga khusus dan penjadwalan rutin untuk pelanggan bisnis. Hubungi kami melalui formulir Layanan Bisnis atau WhatsApp untuk penawaran spesial.', 'category' => 'Bisnis', 'icon' => 'fa-building', 'sort_order' => 7, 'is_active' => 1],
        ]);
    }
}



