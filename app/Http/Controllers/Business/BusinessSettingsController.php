<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class BusinessSettingsController extends Controller
{
    // Business Setting Update
    public function business_update_details(Request $request){
         
        try{
            $user = User::find($request->user()->id);
            if($user){
                $setting = [
                    'price_id' => $request->price,
                    'cuisine' => $request->cuisine,
                    'themes' => $request->themes,
                    'amenities' => $request->amenities,
                    'experiences' => $request->experiences,
                    'features' => $request->features
                ];
                $user->business->businesssettings()->updateOrCreate(['business_id' => $user->business->id], $setting);
                return back()->with('success','Business Details Updated!');

            }
            return back()->with('error','Business Details Not Updated!');

        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        }

    }
}
