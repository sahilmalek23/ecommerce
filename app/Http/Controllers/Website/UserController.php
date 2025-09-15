<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\InvoiceDetail;

class UserController extends Controller
{
    /**
     * Show the login form.
     */
    public function login()
    {
        return view('website.auth.login');
    }

    /**
     * Generate and send OTP to the user.
     */
    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        /* $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'We could not find a user with that email address.']);
        } */

        // Generate a 6-digit OTP
        $otp = rand(100000, 999999);

        // Store OTP and email in session for verification
        $request->session()->put('otp', $otp);
        $request->session()->put('otp_email', $request->email);
        $request->session()->put('otp_expires_at', now()->addMinutes(10));

        // Send OTP via email
        Mail::to($request->email)->send(new \App\Mail\SendOtpMail($otp));

        return redirect()->route('otp.verify.form')->with('success', 'An OTP has been sent to your email.');
    }

    /**
     * Show the OTP verification form.
     */
    public function showOtpForm()
    {
        return view('website.auth.verify-otp');
    }

    /**
     * Verify the OTP and log the user in.
     */
    public function verifyAndLogin(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric|digits:6',
        ]);
        
        // Check if OTP session data exists
        if (!$request->session()->has(['otp', 'otp_email', 'otp_expires_at'])) {
            return redirect()->route('login')->withErrors(['otp' => 'Your OTP has expired. Please try again.']);
        }

        // Check if OTP has expired
        if (now()->gt($request->session()->get('otp_expires_at'))) {
            
            $request->session()->forget(['otp', 'otp_email', 'otp_expires_at']);
            return redirect()->route('login')->withErrors(['otp' => 'Your OTP has expired. Please try again.']);
        }
        
        // Check if OTP is correct
        if ($request->otp == $request->session()->get('otp')) {
            $user = User::where('email', $request->session()->get('otp_email'))->first();

            if ($user) {
                // Log the user in
                Auth::login($user, true);
                $request->session()->forget(['otp', 'otp_email', 'otp_expires_at']);                

            } else {                
                $user = User::create([                    
                    'email' => $request->session()->get('otp_email'),                    
                ]);
                Auth::login($user, true);                                
                $request->session()->forget(['otp', 'otp_email', 'otp_expires_at']);                
            }
            
            if (!empty(session()->get('purchase'))) {
                $updateData = [];
                $updateData['userid'] = $user->id;  
                $updateData['randomsession'] = null;                           
                InvoiceDetail::where('randomsession', session()->get('purchase'))
                ->update($updateData);    
                $request->session()->forget('randomsession');            
            }
            return redirect()->intended('/');
        }

        return back()->withErrors(['otp' => 'The OTP you entered is incorrect.']);
    }

    public function register()
    {
        /* if (!empty(session()->get('purchase'))) {
                $updateData = [];
                $updateData['userid'] = 3;  
                $updateData['randomsession'] = null;                           
                InvoiceDetail::where('randomsession', session()->get('purchase'))
                ->update($updateData);                
        } */
        // Placeholder for registration page
        return "Registration page coming soon!";
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
