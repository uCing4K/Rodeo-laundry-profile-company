<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('team_members')->insert([
            [
                'name'       => 'Owner Rodeo Laundry',
                'position'   => 'Pemilik & Pendiri',
                'bio'        => 'Pendiri Rodeo Laundry yang memulai usaha dengan visi memberikan layanan laundry terbaik di Kota Batu.',
                'sort_order' => 1,
                'is_active'  => 1,
            ],
        ]);
    }
}



