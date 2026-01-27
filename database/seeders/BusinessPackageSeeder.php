<?php

namespace Database\Seeders;

use App\Models\BusinessPackage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BusinessPackage::create([
            'title' => 'Starter Package - Free',
            'description' => 'Business Listing Online Booking Feature 20 FREE Bookings/month CRM up to 50 customer',
            'reservations' => '20',
            'reservations_label' => '20 FREE Bookings/month',
            'contacts' => '50',
            'contacts_label' => 'CRM up to 50 customer',
        ]);

        BusinessPackage::create([
            'title' => 'GOLD',
            'description' => 'Everything in FREE package <br> + PLUS <br> Featured Listing <br> 50 Bookings Covered <br> Table Management <br> View Management <br>',
            'reservations' => '50',
            'reservations_label' => '',
            'contacts' => '50',
            'contacts_label' => '',
            'price' => '400',
            'annual' => '4800',
        ]);

        BusinessPackage::create([
            'title' => 'PLATINUM',
            'description' => 'Everything in GOLD package<br> + PLUS<br> Featured+ Listing <br> 250 Bookings Covered <br> Promotion in Platform<br>',
            'reservations' => '250',
            'reservations_label' => '',
            'contacts' => '50',
            'contacts_label' => '',
            'price' => '999',
            'annual' => '11000',
        ]);
    }
}
