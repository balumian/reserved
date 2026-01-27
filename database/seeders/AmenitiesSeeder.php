<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Amenities;

class AmenitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Amenities::truncate();


        Amenities::create([
            'title' => [
                'en' => 'Wheelchair access',
                'ar' => 'مسموح الكرسي المتحركة'
            ]
        ]);

        Amenities::create([
            'title' => [
                'en' => 'Parking',
                'ar' => 'موقف سيارات'
            ]
        ]);

        Amenities::create([
            'title' => [
                'en' => 'Free Parking',
                'ar' => 'موقف سيارات مجاني'
            ]
        ]);

        Amenities::create([
            'title' => [
                'en' => 'Free Wifi',
                'ar' => 'واى فاى مجانى'
            ]
        ]);

        Amenities::create([
            'title' => [
                'en' => 'Kids Playing Area',
                'ar' => 'منطقة لعب الاطفال'
            ]
        ]);

        Amenities::create([
            'title' => [
                'en' => 'Prayer Room',
                'ar' => 'غرفة الصلاة'
            ]
        ]);



    }
}
