<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperiencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Experience::create([
            'title' => [
                'en' => 'Lake View',
                'ar' => 'ليك فيو'
            ]
        ]);

        Experience::create([
            'title' => [
                'en' => 'Food Truck',
                'ar' => 'شاحنة الغذاء'
            ]
        ]);

        Experience::create([
            'title' => [
                'en' => 'Dessert',
                'ar' => 'حَلوَى'
            ]
        ]);

        Experience::create([
            'title' => [
                'en' => 'Beaches',
                'ar' => 'الشواطئ'
            ]
        ]);

        Experience::create([
            'title' => [
                'en' => 'Mountains',
                'ar' => 'الجبال'
            ]
        ]);
    }
}
