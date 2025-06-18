<?php

use App\Models\Auth\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersonalDetailController;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Dashboard Routes (role-based)
Route::middleware('auth')->group(function() {
    Route::get('/dashboard/admin', [AuthController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard', [AuthController::class, 'index'])->name('dashboard.index');
   Route::resource('personal-details', PersonalDetailController::class)->middleware('auth');
});
