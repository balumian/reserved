<?php

namespace Database\Seeders;

use App\Models\WeekDays;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeekDaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WeekDays::truncate();

        WeekDays::create([
            'day' => [
                'en' => 'Sunday',
                'ar' => 'الأحد'
            ]
        ]);

        WeekDays::create([
            'day' => [
                'en' => 'Monday',
                'ar' => 'الاثنين'
            ]
        ]);

        WeekDays::create([
            'day' => [
                'en' => 'Tuesday',
                'ar' => 'يوم الثلاثاء'
            ]
        ]);

        WeekDays::create([
            'day' => [
                'en' => 'Wednesday',
                'ar' => 'الأربعاء'
            ]
        ]);

        WeekDays::create([
            'day' => [
                'en' => 'Thursday',
                'ar' => 'يوم الخميس'
            ]
        ]);

        WeekDays::create([
            'day' => [
                'en' => 'Friday',
                'ar' => 'جمعة'
            ]
        ]);

        WeekDays::create([
            'day' => [
                'en' => 'Saturday',
                'ar' => 'السبت'
            ]
        ]);
         
    }
}
