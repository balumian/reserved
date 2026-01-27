<?php

namespace Database\Seeders;

use App\Models\Areas;
use App\Models\Emirates;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmirateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Areas::truncate();
        // Emirates::truncate();

        Emirates::create([
            'name' => [
                'en' => 'Dubai',
                'ar' => 'دبي'
            ]
        ]);

        Emirates::create([
            'name' => [
                'en' => 'Sharjah',
                'ar' => 'الشارقة'
            ]
        ]);

        Emirates::create([
            'name' => [
                'en' => 'Abu Dhabi',
                'ar' => 'أبو ظبي'
            ]
        ]);

        Emirates::create([
            'name' => [
                'en' => 'Ajman',
                'ar' => 'عجمان'
            ]
        ]);

        Emirates::create([
            'name' => [
                'en' => 'Fujairah',
                'ar' => 'الفجيرة'
            ]
        ]);

        Emirates::create([
            'name' => [
                'en' => 'Ras Al Khaimah',
                'ar' => 'رأس الخيمة'
            ]

        ]);

        Emirates::create([
            'name' => [
                'en' => 'Umm Al Quwain',
                'ar' => 'أم القيوين'
            ]
        ]);
    }
}
