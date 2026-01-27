<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         
        User::create([
            'name' => 'Innovation Box',
            'email' => 'naveed@innovationbox.ae',
            'password' => Hash::make('iBoxadmin@22'),
            'email_verified_at' => Carbon::now(),
            'user_type' => 'admin'
        ]);

        User::create([
            'name' => 'Reserved Admin',
            'email' => 'Jassim.r@outlook.com',
            'password' => Hash::make('Reserved@123'),
            'email_verified_at' => Carbon::now(),
            'user_type' => 'admin'
        ]);


        // Front User Create

        $customer = new User();
        $customer->name = 'Ajith Joyal';
        $customer->email = 'ajith@innovationbox.ae';
        $customer->password = Hash::make('AjJoy@Res2022');
        $customer->email_verified_at = Carbon::now();
        $customer->user_type = 'customer';
        $customer->save();

        // Business User

        $business = new User();
        $business->name = 'Farrukh Khan';
        $business->email = 'farrukh@innovationbox.ae';
        $business->password = Hash::make('UpdAC@Res2023');
        $business->email_verified_at = Carbon::now();
        $business->user_type = 'business';
        $business->save();

        $profile = [
            'nationality' => '168',
            'code' => '+971',
        ];

        // Create Profile
        $business->profile()->updateOrCreate(['user_id' => $business->id], $profile);

        // Setup Business

        $business->business()->updateOrCreate(['user_id' => $business->id], []);


    }
}
