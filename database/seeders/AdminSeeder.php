<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{

    public function run(): void
    {

        User::updateOrCreate(
            ['email' => 'admin@rodeolaundry.com'],
            [
                'name' => 'Admin Rodeo Laundry',
                'email_verified_at' => now(),
                'password' => 'Admin@12345',
            ]
        );


    }
}
