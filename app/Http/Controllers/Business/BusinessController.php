<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Areas;
use App\Models\Business;
use App\Models\BusinessPackage;
use App\Models\Countries;
use App\Models\Emirates;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class BusinessController extends Controller
{
    public function index()
    {
        $countries = Countries::where('active', 1)->get();
        $emirates = Emirates::where('status', 1)->get();
        $areas = Areas::where('status', 1)->get();
        $packages = BusinessPackage::where('status', 1)->get();
        return view('business.signup.index', ['countries' => $countries, 'emirates' => $emirates, 'areas' => $areas, 'packages' => $packages]);
    }

    // Business create Step one data store in session

    public function step1(Request $request)
    {
        try {
            // Validate required field
            $request->validate([
                'name' => ['required', 'string', 'max:255', 'min:3'],
                'email' => ['required', 'string', 'max:255', 'unique:' . User::class, 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
                'password' => ['required', 'confirmed', Password::min(8)->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),],
            ]);

            //  Validate optional field
            if (empty($request->session()->get('user'))) {
                $user = new User();
            } else {
                $user = $request->session()->get('user');;
            }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
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
                'phone' => ['required','numeric', 'max_digits:10'],
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
                'name' => ['required', 'min:3', 'max:255'],
                'name_ar' => ['required', 'min:3', 'max:255'],
                'residence_front' => ['required', 'mimes:gif,jpg,png,pdf'],
                'residence_back' => ['required', 'mimes:gif,jpg,png,pdf'],
                'passport' => ['required', 'mimes:gif,jpg,png,pdf'],
                'trade_license' => ['required', 'mimes:gif,jpg,png,pdf'],
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

                    if (BusinessPackage::take(1)->first()) {
                        $package = $request->session()->pull('package');
                        $details = BusinessPackage::take(1)->first();
                        $arr = [
                            'reservations' => $details->reservations,
                            'contacts' => $details->reservations,
                            'package_id' => $details->id
                        ];

                        $business = Business::where('user_id', $user->id)->first();
                        $business->activepackage()->updateOrCreate(['business_id' => $business->id], $arr);
                    }

                    // Verification Link
                    event(new Registered($user));
                    // Notification
                    if($user){
                        $data = [
                            'business' => $user->business->name,
                            'name' => $user->name,
                            'email' => $user->email,
                            'phone' => '('.$user->profile->code.') '.$user->profile->phone,
                        ];
                        new_business_admin_email($data);
                    }

                    $request->session()->forget('user');
                    $request->session()->forget('profile');
                    $request->session()->forget('business');

                    return redirect()->route('admin.business', ['success' => 'Business Created Successfully!']);
                }
            }

            // Validate required field

            return response()->json(['error' => 'Business not create something went wrong!']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    // pending
    // public function pending()
    // {
    //     if(Auth::user()->business->status){
    //         return redirect('/business/dashboard');
    //     }else{
    //         return view('business.pending.index');
    //     }
    // }
    // pending
    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    // Dashboard

    public function dashboard():View
    {
        return view('business.dashboard');
    }

    
}
