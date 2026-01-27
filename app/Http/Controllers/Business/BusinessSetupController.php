<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\BusinessPackage;
use App\Models\BusinessTypes;
use App\Models\Cuisines;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BusinessSetupController extends Controller
{
    public function index(Request $request)
    {
        $types = BusinessTypes::pluck('title', 'id');
        $package = null;
        if($request->user()->business){
            $package = $request->user()->business->activepackage;
        }
        return view('business.setup.index', ['business' => $request->user(), 'types' => $types, 'package' => $package]);
    }

    // Update Business Profile Settings
    public function settings(Request $request)
    {
        try {
            $request->validate([
                'type' => ['required'],
                'reservation_type' => ['required'],
                'capacity' => ['required','numeric']
            ]);
            
            $business = [
                'business_type_id' => $request->type,
                'reservation_type' => $request->reservation_type,
                'capacity' => $request->capacity
            ];

            $request->user()->business()->updateOrCreate(['user_id' => $request->user()->id], $business);
            return back();
            return back()->with('success', 'Business Settings Saved!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    // Business Package Change Request

    public function package_change_request(Request $request){
        try{
            $request->validate([
                'package' => ['required'],
                'reservations' => ['required'],
                'contacts' => ['required'],
            ]);
            
            $message = [
                'business' => $request->user()->business->name,
                'package' => BusinessPackage::find($request->package),
                'reservations' => $request->reservations,
                'contacts' => $request->contacts,
            ];
            $user = User::where('email',env('ADMIN_NOTIFICATIONS'))->first();

            if($user){
                package_changed_request_email($user, $message);
                return back()->with('success','Business Package Change Request Sent!');
            }else{
                return back()->with('error','Business Package Change Request Not Sent!');
            }
            
        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }

    public function business_cover_update(Request $request){
        try {
            $request->validate([
                'cover_photo' => ['required','mimes:gif,jpg,png,pdf'],
            ]);
             
            $profile = [];
            if ($request->hasFile('cover_photo')) {
                $path = "";
                $path = store_files_with_thumbnail($request, 'cover_photo', 'business');
                $profile['cover_photo'] = $path;
            }

            $request->user()->business()->updateOrCreate(['user_id' => $request->user()->id], $profile);
            return response()->json(['success' => 'Business Cover Update Successfully!']);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function avatar_update(Request $request){

        try {
            $request->validate([
                'avatar' => ['required','mimes:jpg,png,pdf'],
            ]);
            $business = User::find($request->user()->id);
            $profile = [];
            if ($request->hasFile('avatar')) {
                $path = "";
                $path = store_files($request, 'avatar', 'business');
                $profile['avatar'] = $path;
            }
            $business->profile()->updateOrCreate(['user_id' => $business->id], $profile);
            return response()->json(['success' => 'Business Logo Update Successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }

    }

    public function document_update(Request $request){
        try {

            // Validate required field
            $request->validate([
                'name' => ['required', 'min:3', 'max:255'],
                'name_ar' => ['required', 'min:3', 'max:255'],
                'residence_front' => ['required', 'mimes:gif,jpg,png,pdf'],
                'residence_back' => ['mimes:gif,jpg,png,pdf'],
                'passport' => ['mimes:gif,jpg,png,pdf'],
                'trade_license' => ['mimes:gif,jpg,png,pdf'],
            ]);

            $user = User::find($request->user()->id);
            if (!$user) {
                return back()->with('error', 'Business not found!');
            }
            $business = array();
            // Upload ID Front Page
            if ($request->hasFile('residence_front')) {
                $path = "";
                $path = store_files($request, 'residence_front', 'business');
                $business['residence_front'] = $path;
            }
            // Upload ID Back Page
            if ($request->hasFile('residence_back')) {
                $path = "";
                $path = store_files($request, 'residence_back', 'business');
                $business['residence_back'] = $path;
            }
            // Upload Passport

            if ($request->hasFile('passport')) {
                $path = "";
                $path = store_files($request, 'passport', 'business');
                $business['passport'] = $path;
            }
            // Upload License
            if ($request->hasFile('trade_license')) {
                $path = "";
                $path = store_files($request, 'trade_license', 'business');
                $business['trade_license'] = $path;
            }
            $business['license'] = $request->license;
            $business['vat'] = $request->vat;
            $business['name'] = [
                'en' => $request->name,
                'ar' => $request->name_ar
            ];
            $user->business->updateOrCreate(['user_id' => $user->id], $business);
            return back()->with('success', 'Business Documents updated');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function bio_update(Request $request){
       try{
            $request->validate([
                'description' => ['required'],
                'description_ar' => ['required'],
            ]);

            $user = User::find($request->user()->id);

            if($user){
                $translation = [
                    'en' => $request->description,
                    'ar' => $request->description_ar
                ];
                $business = [
                    'overview' => $translation
                ];
                $user->business->updateOrCreate(['user_id' => $user->id], $business);
                return back()->with('success', 'Business overview updated');
            }

            return back()->with('error', 'Business overview not updated');


       }catch(\Exception $e){

            return back()->with('error', $e->getMessage());

       }
    }

    public function package_select(Request $request){
        try {
            $request->validate([
                'package' => ['required'],
            ]);
            $business = $request->user()->business;
            $package = BusinessPackage::find($request->package);
            if ($business && $package) {
                $package = [
                    'package_id' => $request->package,
                    'contacts' => $package->contacts,
                    'reservations' => $package->reservations,
                    'price' => $package->price,
                    'custom' => false,
                    'status' => true,
                ];
                $business->activepackage()->updateOrCreate(['business_id' => $business->id], $package);
                return back()->with('success', 'Business Package Update');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function business_package(Request $request){
        try{
            $request->validate([
                'package_id' => ['required'],
            ]);
            $package = BusinessPackage::find($request->package_id);
            return response()->json(['package' => $package]);
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
