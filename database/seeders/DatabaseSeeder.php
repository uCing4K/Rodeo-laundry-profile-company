<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        $this->call([
            CompanySettingSeeder::class,
            OperatingHourSeeder::class,
            ServiceTypeSeeder::class,
            ServiceCategorySeeder::class,
            FaqSeeder::class,
            TestimonialSeeder::class,
        ]);
    }
}



