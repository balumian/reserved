<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivePackages;
use App\Models\Areas;
use App\Models\Business;
use App\Models\BusinessPackage;
use App\Models\Countries;
use App\Models\Emirates;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class BusinessController extends Controller
{
    // Business list

    public function index(): View
    {
        $businesses = User::isbusines()->with('profile')->with('business')->get();
        return view('admin.businesses.business.list', ['businesses' => $businesses]);
    }

    // Business Create form
    public function create(): View
    {
        $countries = Countries::where('active', 1)->get();
        $emirates = Emirates::where('status', 1)->get();
        $areas = Areas::where('status', 1)->get();
        $packages = BusinessPackage::active()->get();
        return view('admin.businesses.business.add', ['countries' => $countries, 'emirates' => $emirates, 'areas' => $areas, 'packages' => $packages]);
    }
    public function show($id)
    {
        $business = User::find($id);
        $package = null;
        if ($business->business->activepackage) {
            $package = ActivePackages::find($business->business->activepackage->id);
        }

        return view('admin.businesses.business.show', ['business' => $business, 'package' => $package]);
    }

    // Business create Step one data store in session

    public function step1(Request $request)
    {
        try {
            // Validate required field
            $request->validate([
                'name' => ['required', 'string', 'max:255','min:3'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class,'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
            ]);

            //  Validate optional field
            if (empty($request->session()->get('user'))) {
                $user = new User();
            } else {
                $user = $request->session()->get('user');;
            }
            if (!$request->autopassword) {
                $request->validate([
                    'password' => ['required', 'confirmed', Password::min(8)->mixedCase()
                        ->numbers()
                        ->symbols()
                        ->uncompromised(),],
                ]);
                $user->password = $request->password;
            } else {
                $user->password = generate_strong_key(8);
            }
            $user->name = $request->name;
            $user->email = $request->email;
            $user->user_type = 'business';

            $request->session()->put('user', $user);

            return response()->json(['success' => 'Details confirmed! Proceed to next']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    // Business create Step Two data store in session

    public function step2(Request $request)
    {
        try {

            // Validate required field
            $request->validate([
                'nationality' => ['required'],
                'code' => ['required'],
                'phone' => ['required'],
                'emirate' => ['required'],
                'area' => ['required'],
            ]);

            if (empty($request->session()->get('profile'))) {
                $profile = array();
            } else {
                $profile = $request->session()->get('profile');;
            }
            $profile['nationality'] = $request->nationality;
            $profile['code'] = $request->code;
            $profile['phone'] = $request->phone;
            $profile['emirate'] = $request->emirate;
            $profile['area'] = $request->area;
            $profile['address'] = $request->address;
            $request->session()->put('profile', $profile);

            return response()->json(['success' => 'Details confirmed! Proceed to next']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    // Business create Step Three data store in session

    public function step3(Request $request)
    {
        try {

            // Validate required field
            $request->validate([
                'name' => ['required'],
                'name_ar' => ['required'],
                'residence_front' => ['required', 'mimes:gif,jpg,png,pdf'],
                'residence_back' => ['required', 'mimes:gif,jpg,png,pdf'],
                'passport' => ['required', 'mimes:gif,jpg,png,pdf'],
                'trade_license' => ['required', 'mimes:gif,jpg,png,pdf'],
                'package' => ['required'],

            ]);

            if (empty($request->session()->get('business'))) {
                $business = array();
            } else {
                $business = $request->session()->get('business');
            }
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
            if ($request->package) {
                if (empty($request->session()->get('package'))) {
                    $package = array();
                } else {
                    $package = $request->session()->get('package');
                }
                $package = $request->package;
                $request->session()->put('package', $package);
            }
            $request->session()->put('business', $business);

            return response()->json(['success' => 'Details confirmed! Proceed to next']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function step4(Request $request)
    {
        try {
            if (!empty($request->session()->get('user'))) {
                $user = $request->session()->pull('user');
                $pass = $user->password;
                $user->password = Hash::make($pass);
                if ($request->accountverify) {
                    $user->email_verified_at = \Carbon\Carbon::now();
                }
                $user->save();

                if ($user->id) {

                    if (!empty($request->session()->get('profile'))) {
                        $profile = $request->session()->pull('profile');
                        $user->profile()->updateOrCreate(['user_id' => $user->id], $profile);
                    }

                    if (!empty($request->session()->get('business'))) {
                        $business = $request->session()->pull('business');
                        if ($request->businessverify) {
                            $business['status'] = true;
                        }
                        $user->business()->updateOrCreate(['user_id' => $user->id], $business);
                    }

                    if (!empty($request->session()->get('package'))) {
                        $package = $request->session()->pull('package');
                        $details = BusinessPackage::find($package);
                        $arr = [
                            'reservations' => $details->reservations,
                            'contacts' => $details->reservations,
                            'package_id' => $details->id
                        ];

                        $business = Business::where('user_id', $user->id)->first();
                        $business->activepackage()->updateOrCreate(['business_id' => $business->id], $arr);
                    }
                    $data = [
                        'name' => $user->name,
                        'email' => $user->email,
                        'pass' => $pass
                    ];
                    // Verification Link
                    event(new Registered($user));
                    // Notification
                    if ($request->sendaccount) {
                        business_info_email($user, $data);
                    }

                    $request->session()->forget('user');
                    $request->session()->forget('profile');
                    $request->session()->forget('business');
                    if($user){
                        $data = [
                            'business' => $user->business->name,
                            'name' => $user->name,
                            'email' => $user->email,
                            'phone' => '('.$user->profile->code.') '.$user->profile->phone,
                        ];
                        new_business_admin_email($data);
                    }
                    return redirect()->route('admin.business', ['success' => 'Business Created Successfully!']);
                }
            }

            // Validate required field

            return response()->json(['error' => 'Business not create something went wrong!']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $request->validate([
                'data_id' => ['required']
            ]);
            $user = User::find($request->data_id);
            if ($user) {
                $user->profile()->delete();
                $user->business()->delete();
                $user->delete();
                return back()->with('success', 'Business deleted successfully!');
            } else {
                return back()->with('status', 'Business not found!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the bulk resource from storage.
     */
    public function bulk_destroy(Request $request)
    {
        try {
            $request->validate([
                'action' => ['required'],
                'list' => ['required']
            ]);
            if ($request->action == 'delete') {
                foreach ($request->list as $list) {
                    $user = User::find($list);
                    if ($user) {
                        $user->profile()->delete();
                        $user->business()->delete();
                        $user->delete();
                    }
                }
                return back()->with('success', 'All selected data are deleted!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    // Business Edit Form

    public function edit($id)
    {
        $countries = Countries::where('active', 1)->get();
        $emirates = Emirates::where('status', 1)->get();
        $areas = Areas::where('status', 1)->get();
        $business = User::find($id);
        $package = null;
        if ($business->business->activepackage) {
            $package = ActivePackages::find($business->business->activepackage->id);
        }
        return view('admin.businesses.business.edit', ['business' => $business, 'countries' => $countries, 'emirates' => $emirates, 'areas' => $areas, 'package' => $package]);
    }
    public function profile_update(Request $request)
    {
        try {

            $request->validate([
                'name' => ['required','min:3','max:255'],
                'email' => ['required', 'string', 'max:255','regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
                'phone' => ['max:10']
            ]);

            // Validation email changed or not
            $business = User::find($request->data_id);

            if ($business->email != $request->email) {
                $request->validate([
                    'email' => ['email', 'unique:' . User::class],
                ]);
            }
            $business->name = $request->name;
            $business->email = $request->email;

            // if email changed need to verify
            if ($business->isDirty('email')) {
                $business->email_verified_at = null;
            }

            $profile = [
                'code' => $request->code,
                'phone' => $request->phone,
                'nationality' => $request->nationality,
                'emirate' => $request->emirate,
                'area' => $request->area,
                'address' => $request->address,
            ];
            $business->profile()->updateOrCreate(['user_id' => $business->id], $profile);
            $business->save();

            return back()->with('success', 'Profile Update successfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    // Password Change
    public function password_update(Request $request)
    {
        try {
            $request->validate([
                'password' => ['required', 'confirmed', Password::min(8)->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),],
            ]);

            $user = User::find($request->user);
            $user->password = Hash::make($request->password);
            $user->save();
            return back()->with('success', 'Password Update successfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    // Cover Update Business
    public function cover_update(Request $request)
    {
        try {
            $request->validate([
                'cover_photo' => ['required','mimes:gif,jpeg,jpg,png'],
                'user' => ['required']
            ]);
            $business = User::find($request->user);
            $profile = [];
            if ($request->hasFile('cover_photo')) {
                $path = "";
                $path = store_files_with_thumbnail($request, 'cover_photo', 'business');
                $profile['cover_photo'] = $path;
            }
            $business->business()->updateOrCreate(['user_id' => $business->id], $profile);
            return response()->json(['success' => 'Business Cover Update Successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
    // Avatar Update Business
    public function avatar_update(Request $request)
    {
        try {
            $request->validate([
                'avatar' => ['required','mimes:gif,jpeg,jpg,png'],
                'user' => ['required']
            ]);
            $business = User::find($request->user);
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

    // Account Status Update

    public function account_status_update(Request $request)
    {
        try {

            $request->validate([
                'user' => ['required']
            ]);

            $business = User::find($request->user);

            if ($request->status) {
                $business->status = true;
            } else {
                $business->status = false;
            }
            $business->save();

            return response()->json(['success' => 'Account Status Update!']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    // Business Status Update

    public function business_status_update(Request $request)
    {
        try {

            $request->validate([
                'user' => ['required']
            ]);

            $business = User::find($request->user);
            $profile = [];
            if (!$request->status) {
                $profile['status'] = false;
            } else {
                $profile['status'] = true;
            }
            $business->business()->updateOrCreate(['user_id' => $business->id], $profile);

            return response()->json(['success' => 'Business Status Update!']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    // Business Documents Update
    public function business_document_update(Request $request)
    {
        try {

            // Validate required field
            $request->validate([
                'name' => ['required','min:3','max:255'],
                'name_ar' => ['required','min:3','max:255'],
                'business' => ['required']
            ]);

            $user = User::find($request->business);
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

    // Customize business package

    public function business_custom_package(Request $request)
    {
       
        try {
            $request->validate([
                'reservations' => ['required'],
                'contacts' => ['required'],
                'price' => ['required'],
                'data_id' => ['required'],
            ]);

            $business = Business::find($request->data_id);

            if ($business) {
                $package = [
                    'reservations' => $request->reservations,
                    'contacts' => $request->contacts,
                    'price' => $request->price,
                    'custom' => true,
                ];
                $business->activepackage->updateOrCreate(['business_id' => $business->id], $package);
                return back()->with('success', 'Business Package Update');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function business_update_package(Request $request){
        try{
            $request->validate([
                'package' => ['required'],
                'user' => ['required']
            ]);

            $business = User::find($request->user)->business;
            $pkg = BusinessPackage::find($request->package);
            if ($business) {
                $package = [
                    'reservations' => $pkg->reservations,
                    'contacts' => $pkg->contacts,
                    'price' => $pkg->price,
                    'custom' => false,
                    'package_id' => $pkg->id
                ];
                $business->activepackage()->updateOrCreate(['business_id' => $business->id], $package);
            }
            return back()->with('success', 'Business Package Update');
        }catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    
}
