<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

// class EnsurePhoneIsVerified
// { 
//     public function handle($request, Closure $next)
//     {
//         if (Auth::check() && is_null(Auth::user()->phone_verified_at)) {
//             return redirect()->route('verify.phone.notice')->with('error', 'Please verify your phone number first.');
//         }

//         return $next($request);
//     }
// }

class EnsurePhoneIsVerified
{
    public function __construct()
    {
        dd('Middleware loaded');
    }

    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}

