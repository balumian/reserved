<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BusinessTypes;
class BusinessTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BusinessTypes::truncate();

        $resturant = [
            'en' => 'Restaurants',
            'ar' => 'مطاعم'
        ];
        BusinessTypes::create([
            'title' => $resturant
        ]);

        $cafe = [
            'en' => 'Cafes',
            'ar' => 'المقاهي'
        ];
        BusinessTypes::create([
            'title' => $cafe
        ]);
    }
}
