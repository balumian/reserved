<?php

namespace App\Http\Controllers\Business;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BusinessProfileController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('business.profile', ['profile' => $request->user()]);
    }

    // 
    public function update(Request $request)
    {
        try {

            $user = User::find($request->user()->id);
            // Validation
            $request->validate([
                'name' => ['required', 'string','min:3', 'max:255'],
                'email' => ['required', 'string', 'max:255', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
                'code' => ['required'],
                'phone' => ['required','numeric', 'max_digits:10'],
                'nationality' => ['required'],
                'emirate' => ['required'],
                'area' => ['required'],
            ]);


            // Validation email changed or not
            if (Auth()->user()->email != $request->email) {
                $request->validate([
                    'email' => ['email', 'unique:' . User::class],
                ]);
            }

            $user->name = $request->name;
            $user->email = $request->email;

            // if email changed need to verify
            if ($user->isDirty('email')) {
                $user->email_verified_at = null;
            }

            $profile = [
                'code' => $request->code,
                'phone' => $request->phone,
                'nationality' => $request->nationality,
                'emirate' => $request->emirate,
                'area' => $request->area,
                'address' => $request->address,
            ];
             
            // return $profile;
            $user->profile()->updateOrCreate(['user_id' => $user->id], $profile);

            $user->save();

            return back()->with('success', 'Profile Update successfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    // Business Password Update

    public function password_update(Request $request)
    {
        try {
            $request->validate([
                'password' => ['required', 'confirmed', Password::min(8)->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),],
            ]);

            $user = User::find($request->user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            return back()->with('success', 'Password Update successfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    

}
