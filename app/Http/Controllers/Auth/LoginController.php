<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 'seller') {
                $request->session()->regenerate();
                return redirect()->intended('seller/dashboard');
            } elseif (Auth::user()->role == 'buyer') {
                $request->session()->regenerate();
                return redirect()->intended('/');
            }
        }

        return back()->withErrors([
            'email' => 'Login Failed Please Check Your Email and Password !',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
