<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            BusinessTypeSeeder::class,
            ThemeSeeder::class,
            AmenitiesSeeder::class,
            FeatureSeeder::class,
            CountriesSeeder::class,
            EmirateSeeder::class,
            AreaSeeder::class,
            PriceSeeder::class,
            WeekDaysSeeder::class,
            CuisineSeeder::class,
            ExperiencesSeeder::class,
            MenuCategorySeeder::class,
            BusinessPackageSeeder::class,
            ReservationTypeSeeder::class
        ]);
         
    }
}
