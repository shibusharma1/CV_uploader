<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OTPController extends Controller
{
     public function showVerifyForm()
    {
        return view('auth.verify-otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate(['otp' => 'required|digits:6']);

        $user = auth()->user();

        if ($user->phone_otp === $request->otp) {
            $user->update([
                'phone_verified_at' => now(),
                'phone_otp' => null,
            ]);
            return redirect()->route('user.dashboard')->with('success', 'Phone verified successfully.');
        }

        return back()->with('error', 'Invalid OTP.');
    }
}
