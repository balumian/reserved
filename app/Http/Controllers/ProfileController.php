<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): view
    {
        return view('frontend.profile', [
            'profile' => $request->user()->profile,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)  
    {
        $user = User::find($request->user()->id);
        // Validation
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'code' => ['required'],
            'phone' => ['required'],
            'nationality' => ['required'],
            'emirate' => ['required'],
            'area' => ['required'],
            'address' => ['required'],
        ]);


        // Validation email changed or not
        if(Auth()->user()->email != $request->email){
            $request->validate([
                'email' => ['email', 'unique:' . User::class],
            ]);
        }

        if($request->password){
            $request->validate([
                'current_password' => ['required'],
                'password' => ['required', 'confirmed', Password::min(8)->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),],
            ]);

            if(!Auth::validate(['email' => $request->user()->email,'password' => $request->current_password])):
                throw ValidationException::withMessages([
                    'current_password' => trans('auth.failed'),
                ]);
            endif;

            $user->password = Hash::make($request->password);
            password_changed_email($user);

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
        if ($request->hasFile('avatar')) {
            $path = "";
            $path = store_files($request,'avatar','profile');
            $profile['avatar'] = $path;
        }
        // return $profile;
        $user->profile()->updateOrCreate(['user_id' => $user->id],$profile);

        $user->save();

        return Redirect::route('profile')->with('success', 'Profile Update successfully!');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    // Remove Avatar
    public function remove_avatar(Request $request){
        $user = User::find($request->user()->id);
        $user->profile()->updateOrCreate(['user_id' => $user->id],['avatar' => null]);

        return Redirect::route('profile')->with('success', 'Avatar Deleted Successfully!');
    }
}
