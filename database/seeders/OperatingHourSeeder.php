<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OperatingHourSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('operating_hours')->insert([
            ['day' => 'Senin',  'open_time' => '07:00:00', 'closed_time' => '21:00:00', 'is_closed' => 0],
            ['day' => 'Selasa', 'open_time' => '07:00:00', 'closed_time' => '21:00:00', 'is_closed' => 0],
            ['day' => 'Rabu',   'open_time' => '07:00:00', 'closed_time' => '21:00:00', 'is_closed' => 0],
            ['day' => 'Kamis',  'open_time' => '07:00:00', 'closed_time' => '21:00:00', 'is_closed' => 0],
            ['day' => 'Jumat',  'open_time' => '07:00:00', 'closed_time' => '21:00:00', 'is_closed' => 0],
            ['day' => 'Sabtu',  'open_time' => '07:00:00', 'closed_time' => '21:00:00', 'is_closed' => 0],
            ['day' => 'Minggu', 'open_time' => '08:00:00', 'closed_time' => '20:00:00', 'is_closed' => 0],
        ]);
    }
}



