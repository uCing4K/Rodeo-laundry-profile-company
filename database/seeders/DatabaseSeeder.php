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
            ServiceCategorySeeder::class,
            ServiceTypeSeeder::class,

            ProductSeeder::class,

            FaqSeeder::class,
            TestimonialSeeder::class,
            PageContentSeeder::class,
            TeamMemberSeeder::class,
            StatisticsCacheSeeder::class,

            SampleDataSeeder::class,
        ]);
    }
}



