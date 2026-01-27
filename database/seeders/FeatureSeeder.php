<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Feature;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Feature::truncate();

        Feature::create([
            'title' => [
                'en' => 'Birthday Party',
                'ar' => 'حفلة عيد ميلاد'
            ]
        ]);

        Feature::create([
            'title' => [
                'en' => 'Corporate Events',
                'ar' => 'احداث تجارية'
            ]
        ]);

        Feature::create([
            'title' => [
                'en' => 'Wedding Reception',
                'ar' => 'الاستقبال الخاص بالعرس'
            ]
        ]);

        Feature::create([
            'title' => [
                'en' => 'Iftar Party',
                'ar' => 'حفل الإفطار'
            ]
        ]);

        Feature::create([
            'title' => [
                'en' => 'Events',
                'ar' => 'الأحداث'
            ]
        ]);

    }
}
