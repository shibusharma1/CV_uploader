<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;

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
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (!Auth::user()->hasVerifiedEmail()) {
                return redirect()->route('verification.notice');
            }

            // Redirect to role-specific dashboard
            return redirect()->route($this->redirectUser(Auth::user()));
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.'
        ]);
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name_en' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'phone' => ['required', 'string', 'min:6'],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        $user = User::create([
            'name_en' => $request->name_en,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 2,
        ]);

        // Auth::login($user);

        event(new Registered($user)); // triggers email verification

        auth()->login($user);

        return redirect(route('verification.notice'));
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
