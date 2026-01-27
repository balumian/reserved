<?php

namespace Database\Seeders;

use App\Models\Areas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Areas::truncate();
        // Dubai
        Areas::create([
            'emirates_id' => '1',
            'name' => [
                'en' => 'Sheikh Zayed Road',
                'ar' => 'شارع الشيخ زايد'
            ]
        ]);
        Areas::create([
            'emirates_id' => '1',
            'name' => [
                'en' => 'Downtown Dubai',
                'ar' => 'وسط مدينة دبي'
            ]
        ]);
        Areas::create([
            'emirates_id' => '1',
            'name' => [
                'en' => 'Jumeirah',
                'ar' => 'جميرا'
            ]
        ]);

        // Sharjah
        Areas::create([
            'emirates_id' => '2',
            'name' => [
                'en' => 'Al Taawun',
                'ar' => 'التعاون'
            ]
        ]);
        Areas::create([
            'emirates_id' => '2',
            'name' => [
                'en' => 'Al Nahda',
                'ar' => 'النهدة'
            ]
        ]);
        Areas::create([
            'emirates_id' => '2',
            'name' => [
                'en' => 'Muwaileh',
                'ar' => 'مويلح'
            ]
        ]);
        Areas::create([
            'emirates_id' => '2',
            'name' => [
                'en' => 'Al Majaz',
                'ar' => 'المجاز'
            ]
        ]);

        // Abu Dhabi
        Areas::create([
            'emirates_id' => '3',
            'name' => [
                'en' => 'Khalifa City',
                'ar' => 'مدينة خليفة'
            ]
        ]);
        Areas::create([
            'emirates_id' => '3',
            'name' => [
                'en' => 'Al Mushrif',
                'ar' => 'المشرف'
            ]
        ]);
        Areas::create([
            'emirates_id' => '3',
            'name' => [
                'en' => 'Al Khalidiyah',
                'ar' => 'الخالدية'
            ]
        ]);
        Areas::create([
            'emirates_id' => '3',
            'name' => [
                'en' => 'Al Reef',
                'ar' => 'الريف'
            ]
        ]);

        // Ajman
        Areas::create([
            'emirates_id' => '4',
            'name' => [
                'en' => 'Al Hamidiyah',
                'ar' => 'الحميدية'
            ]
        ]);
        Areas::create([
            'emirates_id' => '4',
            'name' => [
                'en' => 'Hadhf',
                'ar' => 'الهدف'
            ]
        ]);
        Areas::create([
            'emirates_id' => '4',
            'name' => [
                'en' => 'Al Bustān',
                'ar' => 'البستان'
            ]
        ]);

        // Fujairah
        Areas::create([
            'emirates_id' => '5',
            'name' => [
                'en' => 'Al Badiyah',
                'ar' => 'البادية'
            ]
        ]);
        Areas::create([
            'emirates_id' => '5',
            'name' => [
                'en' => 'Afarah',
                'ar' => 'عفارة'
            ]
        ]);
        Areas::create([
            'emirates_id' => '5',
            'name' => [
                'en' => 'Al Bithnah',
                'ar' => 'البثنة'
            ]
        ]);

        // Ras Al Khaimah
        Areas::create([
            'emirates_id' => '6',
            'name' => [
                'en' => 'Al Jazirah Al Hamra',
                'ar' => 'الجزيرة الحمراء'
            ]
        ]);
        Areas::create([
            'emirates_id' => '6',
            'name' => [
                'en' => 'Khatt and Masafi',
                'ar' => 'خط ومسافي'
            ]
        ]);
         
        
        // Umm Al Quwain
        Areas::create([
            'emirates_id' => '7',
            'name' => [
                'en' => 'Falaj al Ali',
                'ar' => 'فلج العلي'
            ]
        ]);
        Areas::create([
            'emirates_id' => '7',
            'name' => [
                'en' => 'Dayni',
                'ar' => 'ديني'
            ]
        ]);

    }
}
