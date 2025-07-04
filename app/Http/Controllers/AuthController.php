<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Helpers\SmsHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginForm(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }
        return view('auth.login');
    }
    public function login(Request $request)
{
    // Validate incoming request
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    
    // Attempt to log the user in
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Check if the user's email is verified
        // if (!Auth::user()->hasVerifiedEmail()) {
        //     // Auth::logout(); // Ensure no session remains
        //     return redirect()->route('verification.notice')->withErrors([
        //         'email' => 'Please verify your email before logging in.',
        //     ]);
        // }

        // Redirect based on user role
        return redirect()->route($this->redirectUser(Auth::user()));
    }

    // Failed login attempt
    return back()->withErrors([
        'email' => 'Invalid credentials.',
    ])->withInput($request->only('email'));
}
    
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
    $request->validate([
        'name_en' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'unique:users,email'],
        'phone' => ['required', 'string', 'min:6', 'unique:users,phone'],
        'password' => ['required', 'confirmed', 'min:6'],
    ]);

    $otp = rand(100000, 999999);

    $user = User::create([
        'name_en' => $request->name_en,
        'email' => $request->email,
        'phone' => $request->phone,
        'password' => Hash::make($request->password),
        'role' => 2,
        'phone_otp' => $otp,
    ]);

    // Send SMS using the integrated API
    try {
        SmsHelper::sendSms($user->phone, "Your verification OTP is: $otp");
    } catch (\Exception $e) {
        return back()->with('error', 'Failed to send OTP. ' . $e->getMessage());
    }

    auth()->login($user);
    return redirect()->route('otp.verify.page')->with('message', 'Please verify your phone number via OTP.');
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Logged out successfully.');
    }

    // Helper function to redirect based on role
    private function redirectUser($user)
    {
        switch ($user->role) {
            case 0:
            case 1:
                return 'admin.dashboard';
            case 2:
                return 'user.dashboard';
            default:
                abort(403, 'Unauthorized access');
        }
    }
}
