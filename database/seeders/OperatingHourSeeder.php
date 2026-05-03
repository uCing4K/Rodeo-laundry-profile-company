<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OperatingHourSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('operating_hours')->insert([
            ['day_of_week' => 1, 'day_name' => 'Senin',  'open_time' => '07:00:00', 'close_time' => '21:00:00', 'is_closed' => 0, 'note' => null],
            ['day_of_week' => 2, 'day_name' => 'Selasa', 'open_time' => '07:00:00', 'close_time' => '21:00:00', 'is_closed' => 0, 'note' => null],
            ['day_of_week' => 3, 'day_name' => 'Rabu',   'open_time' => '07:00:00', 'close_time' => '21:00:00', 'is_closed' => 0, 'note' => null],
            ['day_of_week' => 4, 'day_name' => 'Kamis',  'open_time' => '07:00:00', 'close_time' => '21:00:00', 'is_closed' => 0, 'note' => null],
            ['day_of_week' => 5, 'day_name' => 'Jumat',  'open_time' => '07:00:00', 'close_time' => '21:00:00', 'is_closed' => 0, 'note' => null],
            ['day_of_week' => 6, 'day_name' => 'Sabtu',  'open_time' => '07:00:00', 'close_time' => '21:00:00', 'is_closed' => 0, 'note' => null],
            ['day_of_week' => 7, 'day_name' => 'Minggu', 'open_time' => '08:00:00', 'close_time' => '20:00:00', 'is_closed' => 0, 'note' => 'Jam operasional lebih pendek'],
        ]);
    }
}



