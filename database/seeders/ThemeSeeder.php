<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Theme;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Theme::truncate();

        Theme::create([
            'title' => [
                'en' => 'Romantic',
                'ar' => 'رومانسي'
            ]
        ]);

        Theme::create([
            'title' => [
                'en' => 'Fancy',
                'ar' => 'باهظ'
            ]
        ]);

        Theme::create([
            'title' => [
                'en' => 'Charming',
                'ar' => 'أَخَّاذ'
            ]
        ]);

        Theme::create([
            'title' => [
                'en' => 'Garden',
                'ar' => 'حديقة'
            ]
        ]);

        Theme::create([
            'title' => [
                'en' => 'Kids Friendly',
                'ar' => 'صديقة للأطفال
                '
            ]
        ]);
    }
}
