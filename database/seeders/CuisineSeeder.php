<?php

namespace Database\Seeders;

use App\Models\Cuisines;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CuisineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cuisines::create([
            'title' => [
                'en' => 'Arabic',
                'ar' => 'عربي'
            ]
        ]);
        Cuisines::create([
            'title' => [
                'en' => 'Italian',
                'ar' => 'إيطالي'
            ]
        ]);
        Cuisines::create([
            'title' => [
                'en' => 'Thai',
                'ar' => 'التايلاندية'
            ]
        ]);
        Cuisines::create([
            'title' => [
                'en' => 'Chinese',
                'ar' => 'صينى'
            ]
        ]);
        Cuisines::create([
            'title' => [
                'en' => 'Mexican',
                'ar' => 'مكسيكي'
            ]
        ]);
         
    }
}
