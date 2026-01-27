<?php

namespace Database\Seeders;

use App\Models\MenuCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MenuCategory::create([
            'title' => [
                'en' => 'Breakfast',
                'ar' => 'إفطار'
            ]
        ]);

        MenuCategory::create([
            'title' => [
                'en' => 'Lunch',
                'ar' => 'غداء'
            ]
        ]);

        MenuCategory::create([
            'title' => [
                'en' => 'Dinner',
                'ar' => 'عشاء'
            ]
        ]);

        MenuCategory::create([
            'title' => [
                'en' => 'Beverage',
                'ar' => 'مشروب'
            ]
        ]);

        MenuCategory::create([
            'title' => [
                'en' => 'The Lunch Club',
                'ar' => 'نادي الغداء'
            ]
        ]);
    }
}
