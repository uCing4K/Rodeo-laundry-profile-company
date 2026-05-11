<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('faq')->insert([
            ['question' => 'Berapa lama waktu proses pencucian?', 'answer' => 'Untuk layanan reguler, waktu proses bervariasi tergantung jenis layanan. Cuci setrika biasanya memakan waktu 2-3 hari kerja. Kami juga menyediakan layanan Express 24 Jam dan Same Day untuk kebutuhan mendesak dengan biaya tambahan.'],
            ['question' => 'Apakah ada layanan antar-jemput?', 'answer' => 'Saat ini kami melayani antar-jemput untuk area Kota Batu dan sekitarnya. Silakan hubungi kami via WhatsApp untuk informasi lebih lanjut mengenai jangkauan area dan biaya antar-jemput.'],
        ]);
    }
}



