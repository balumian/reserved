<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\Rules\Password;
class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->validate([
            'email' => ['email','required'],
            'password' => ['required',
            Password::min(8)->mixedCase()
            ->numbers()
            ->symbols()
            ->uncompromised(),],
        ]);

        $request->authenticate();

        $request->session()->regenerate();

        $role = Auth::user()->user_type;
        //  Redirect Based on user type
        switch ($role) {
            case 'admin':
                return redirect()->intended(RouteServiceProvider::AdminDashboard);
                break;
            case 'customer':
                return redirect()->intended(RouteServiceProvider::CustomerDashboard);
                break;
            case 'business':
                return redirect()->intended(RouteServiceProvider::BusinessDashboard);
                break;
            default:
                return redirect()->intended(RouteServiceProvider::HOME);
            break;
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
