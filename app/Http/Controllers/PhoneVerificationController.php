<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhoneVerificationController extends Controller
{
     public function show()
    {
        return view('auth.verify-phone');
    }

    public function sendOtp(Request $request)
    {
        $user = $request->user();
        $user->sendPhoneOtp();
        return back()->with('success', 'OTP sent to '.$user->phone);
    }

    public function verify(Request $request)
    {
        $request->validate(['otp' => 'required|digits:6']);

        $user = Auth::user();
        if ($user->verifyPhoneCode($request->otp)) {
            return redirect()->route('login')->with('success', 'Phone verified.');
        }

        return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
    }
}
