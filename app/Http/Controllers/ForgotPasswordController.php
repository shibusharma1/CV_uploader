<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ForgotPasswordController extends Controller
{
    public function showPhoneOrEmailForm()
    {
        return view('auth.forgot-password');
    }

    public function sendOtp(Request $request)
    {
        $request->validate([
            'identifier' => 'required'
        ]);

        $user = User::where('email', $request->identifier)
            ->orWhere('phone', $request->identifier)
            ->first();

        if (!$user) {
            return back()->withErrors(['identifier' => 'No account found with that email or phone.']);
        }
        $user->sendPhoneOtp();


        return redirect()->route('forgot.password.verifyForm')->with('success', 'OTP sent successfully.');
    }

    public function showVerifyOtpForm()
    {
        return view('auth.verify-otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6'
        ]);

        $user = User::find(Session::get('otp_user_id'));

        if (
            !$user ||
            $user->phone_verification_code != $request->otp ||
            now()->greaterThan($user->phone_verification_expires_at)
        ) {
            return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
        }

        // Clear OTP
        $user->phone_verification_code = null;
        $user->phone_verification_expires_at = null;
        $user->save();

        Session::put('password_reset_user_id', $user->id);
        return redirect()->route('forgot.password.resetForm');
    }

    public function showResetForm()
    {
        return view('auth.reset-password');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::find(Session::get('password_reset_user_id'));

        if (!$user) {
            return redirect()->route('forgot.password')->withErrors(['error' => 'Session expired. Try again.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        Session::forget(['otp_user_id', 'password_reset_user_id']);

        return redirect()->route('login')->with('success', 'Password reset successfully.');
    }
}
