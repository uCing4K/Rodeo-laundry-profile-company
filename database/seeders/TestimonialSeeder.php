<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('testimonials')->insert([
            ['customer_name' => 'Ibu Sarah', 'customer_title' => 'Pelanggan Tetap', 'content' => 'Sudah langganan di Rodeo Laundry hampir setahun. Hasilnya selalu bersih dan wangi. Yang paling saya suka, bisa tracking pesanan online jadi tidak perlu telepon terus untuk tanya sudah selesai atau belum.', 'rating' => 5, 'sort_order' => 1, 'is_active' => 1],
            ['customer_name' => 'Bapak Erick', 'customer_title' => 'Pemilik Erick Catering', 'content' => 'Untuk kebutuhan catering, kami butuh laundry yang bisa diandalkan untuk cuci taplak dan serbet dalam jumlah besar. Rodeo Laundry selalu tepat waktu dan hasilnya memuaskan. Recommended!', 'rating' => 5, 'sort_order' => 2, 'is_active' => 1],
            ['customer_name' => 'Villa Aster Management', 'customer_title' => 'Pengelola Villa', 'content' => 'Kami mempercayakan seluruh kebutuhan laundry villa kepada Rodeo Laundry. Mulai dari seprai, handuk, hingga selimut. Pelayanan profesional dan harga bersahabat untuk partner bisnis.', 'rating' => 5, 'sort_order' => 3, 'is_active' => 1],
            ['customer_name' => 'Dina Rahmawati', 'customer_title' => 'Mahasiswi', 'content' => 'Harganya terjangkau banget untuk anak kos. Cuci setrika cuma Rp 5.000/kg. Prosesnya juga cepat, biasanya 2-3 hari sudah bisa diambil. Tempatnya juga bersih.', 'rating' => 4, 'sort_order' => 4, 'is_active' => 1],
            ['customer_name' => 'Pak Hendro', 'customer_title' => 'Warga Sumberejo', 'content' => 'Lokasi dekat dari rumah, pelayanan ramah. Saya sering pakai layanan express kalau butuh cepat. Hasilnya tidak mengecewakan.', 'rating' => 5, 'sort_order' => 5, 'is_active' => 1],
        ]);
    }
}



