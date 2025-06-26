<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| All application routes are registered here. Organized using prefixes,
| middleware, naming conventions, and comments for clarity.
*/

// ===============================
// Public Routes
// ===============================

// Home page
Route::get('/', fn () => view('home'))->name('home');

// Test page (temporary or for debugging)
Route::get('/test', fn () => view('test'));

// ===============================
// Authentication Routes
// ===============================

// Login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // Registration
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// ===============================
// Email Verification Routes
// ===============================

// Show verification notice
Route::get('/email/verify', fn () => view('auth.verify-email'))
    ->middleware('auth')
    ->name('verification.notice');

// Handle email verification
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard/user');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Resend verification link
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// ===============================
// Authenticated User/Admin Routes
// ===============================
Route::middleware(['auth'])->group(function () {

    // User dashboard
    Route::get('/dashboard/user', [DashboardController::class, 'user'])->name('user.dashboard');

    // Admin dashboard
    Route::get('/dashboard/admin', [DashboardController::class, 'admin'])->name('admin.dashboard');

    // Admin Management
    Route::resource('admins', AdminController::class);

    // Application Settings
    Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
});

// ===============================
// Applicants Management Routes
// ===============================
Route::prefix('applicants')->name('applicants.')->group(function () {
    Route::get('/', [ApplicantController::class, 'index'])->name('index');              // List applicants
    Route::get('/create', [ApplicantController::class, 'create'])->name('create');      // Show create form
    Route::post('/', [ApplicantController::class, 'store'])->name('store');             // Store applicant
    Route::get('/{applicant}/edit', [ApplicantController::class, 'edit'])->name('edit');// Edit form
    Route::put('/{applicant}', [ApplicantController::class, 'update'])->name('update'); // Update applicant
    Route::delete('/{applicant}', [ApplicantController::class, 'destroy'])->name('destroy'); // Delete
    Route::get('/show/{applicant}', [ApplicantController::class, 'show'])->name('show');// Show details
});

// ===============================
// User Management Routes
// ===============================
Route::resource('users', UserController::class); // Standard CRUD routes for users

// Toggle user status (e.g., activate/deactivate)
Route::patch('users/{user}/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggle-status');






// Fallback page
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
