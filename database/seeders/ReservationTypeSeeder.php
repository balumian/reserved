<?php

namespace Database\Seeders;

use App\Models\ReservationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReservationType::create(
            [
            'type' => 'General reservations',
            'created_by' => 1
            ]
        );

        ReservationType::create(
            [
            'type' => 'Table based booking',
            'created_by' => 1
            ]
        );
    }
}
