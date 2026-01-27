<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CustomerController extends Controller
{
    // Customer List

    public $pass = "";
    public $verify = null;

    public function index()
    {

        $customers = User::customer()->get();
        return view('admin.customers.customer-list', ['customers' => $customers]);
    }

    // New Customer Form

    public function new_customer()
    {
        return view('admin.customers.add-customer');
    }

    // Save Customer

    public function save_customer(Request $request)
    {
        // Validate required field
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'string', 'max:255', 'unique:' . User::class, 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
        ]);

        //  Validate optional field
        if (!$request->autopassword) {
            $request->validate([
                'password' => ['required', 'confirmed', Password::min(8)->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),],
            ]);
            //Assign optional field
            $this->pass = $request->password;
        } else {
            $this->pass = generate_strong_key(8);
        }
        if ($request->accountverified) {
            $this->verify = \Carbon\Carbon::now();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($this->pass),
            'user_type' => 'customer',
            'email_verified_at' => $this->verify
        ]);
        $user->pass = $this->pass;
        // Verification Link
        event(new Registered($user));
        // Notification
        if ($request->sendaccount) {
            customer_info_email($user);
        }
        return back()->with('status', 'Customer added successfully!');
    }


    public function delete_customer(Request $request)
    {
        try {
            $request->validate([
                'data_id' => ['required']
            ]);
            $user = User::find($request->data_id);
            if ($user) {
                $user->profile()->delete();
                $user->delete();
                return back()->with('success', 'Customer deleted successfully!');
            } else {
                return back()->with('status', 'Customer not found!');
            }
        } catch (\Illuminate\Database\QueryException $e) {

            return back()->with('error', 'You cannot delete this user!');
        }
    }

    // View Customer details

    public function view_customer(string $id)
    {
        $customer = User::find($id);
        return view('admin.customers.view-customer', ['customer' => $customer]);
    }
    public function edit_customer(string $id)
    {
        $customer = User::find($id);
        return view('admin.customers.edit-customer', ['customer' => $customer]);
    }
    public function update_customer(Request $request)
    {

        try {
            $user = User::find($request->user);

            $request->validate([
                'name' => ['required', 'string', 'max:255', 'min:3'],
                'email' => ['required', 'string', 'max:255', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
                'phone' => ['max:10'],
                'avatar' => ['mimes:gif,jpg,png,pdf']
            ]);
            if ($user->email != $request->email) {
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
            if ($request->hasFile('avatar')) {
                $path = "";
                $path = store_files($request, 'avatar', 'profile');
                $profile['avatar'] = $path;
            }
            if ($request->status) {
                $user->status = true;
            } else {
                $user->status = false;
            }

            $user->profile()->updateOrCreate(['user_id' => $user->id], $profile);
            $user->save();
            return back()->with('success', 'User Update successfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function update_password(Request $request)
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
                        $user->delete();
                    }
                }
                return back()->with('success', 'All selected data are deleted!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
