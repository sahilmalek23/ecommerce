<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function hashGenerator() {
        $password = "admin";
        return Hash::make($password);
    }
    public function login() {
        return view('admin.auth.admin.login');
    }

    public function loginSubmit(Request $request) {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required' ],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');   
        }

        return back()->withErrors([
            'password' => 'The provided credentials do not match our records.',
        ])->onlyInput('password');


    }
    
}
