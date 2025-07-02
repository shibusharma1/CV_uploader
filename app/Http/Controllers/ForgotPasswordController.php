<?php 
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    // Show email input form
    public function showEmailForm()
    {
        return view('auth.forgot-password');
    }

    // Send OTP to email
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $otp = rand(100000, 999999);
        Session::put('otp', $otp);
        Session::put('email', $request->email);

        Mail::raw("Your OTP is: $otp", function ($message) use ($request) {
            $message->to($request->email)
                ->subject('Password Reset OTP');
        });

        return redirect()->route('forgot.password.otpForm')->with('success', 'OTP sent to your email.');
    }

    // Show OTP form
    public function showOtpForm()
    {
        return view('auth.verify-otp');
    }

    // Verify OTP
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric',
        ]);

        if ($request->otp == Session::get('otp')) {
            return redirect()->route('forgot.password.resetForm')->with('success', 'OTP verified. You can now reset your password.');
        }

        return back()->with('error', 'Invalid OTP.');
    }

    // Show password reset form
    public function showResetForm()
    {
        if (!Session::has('email')) {
            return redirect()->route('forgot.password.form');
        }

        return view('auth.reset-password');
    }

    // Reset the password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::where('email', Session::get('email'))->first();

        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();

            Session::forget(['otp', 'email']);

            return redirect()->route('login')->with('success', 'Password reset successfully.');
        }

        return back()->with('error', 'Something went wrong.');
    }
}
