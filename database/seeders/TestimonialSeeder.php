<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('testimonials')->insert([
            ['customer_name' => 'Ibu Sarah', 'content' => 'Sudah langganan di Rodeo Laundry hampir setahun. Hasilnya selalu bersih dan wangi. Yang paling saya suka, bisa tracking pesanan online jadi tidak perlu telepon terus untuk tanya sudah selesai atau belum.'],
            ['customer_name' => 'Bapak Erick', 'content' => 'Untuk kebutuhan catering, kami butuh laundry yang bisa diandalkan untuk cuci taplak dan serbet dalam jumlah besar. Rodeo Laundry selalu tepat waktu dan hasilnya memuaskan. Recommended!'],
        ]);
    }
}



