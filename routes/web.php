<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
Route::get('/clear-all', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');
    return 'All cache cleared!';
});

// Home page
Route::get('/', fn() => view('home'))->name('home');

// Test page (temporary or for debugging)
// Route::get('/test', fn() => view('test'));
Route::get('/admitcard', fn() => view('admitcard'));
Route::get('/pdf', fn() => view('pdf'));

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
Route::get('/email/verify', fn() => view('auth.verify-email'))
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
    Route::get('/settings-list', [SettingController::class, 'edit'])->name('settings.edit');
    Route::post('/settings-update', [SettingController::class, 'update'])->name('settings.update');
    // ===============================
// Applicants Management Routes
// ===============================
    Route::prefix('applicants')->name('applicants.')->group(function () {
        Route::get('/applicant-list', [ApplicantController::class, 'index'])->name('index');              // List applicants
        Route::get('/create', [ApplicantController::class, 'create'])->name('create');      // Show create form
        Route::get('/get-districts/{provinceCode}', [ApplicantController::class, 'getDistricts']);
        Route::get('/get-local-bodies/{districtCode}', [ApplicantController::class, 'getLocalBodies']);

        Route::post('/store', [ApplicantController::class, 'store'])->name('store');             // Store applicant
        Route::get('/{applicant}/edit', [ApplicantController::class, 'edit'])->name('edit');// Edit form
        Route::put('/{applicant}', [ApplicantController::class, 'update'])->name('update'); // Update applicant
        // Route::get('/delete-applicant/{applicant}', [ApplicantController::class, 'destroy'])->name('delete-applicant'); // Delete
        Route::get('applicants/delete-applicant/{applicant}', [ApplicantController::class, 'destroy'])->name('delete-applicant');
        Route::get('/show/{applicant}', [ApplicantController::class, 'show'])->name('show');// Show details
        Route::get('/showcollege', [ApplicantController::class, 'showUserColleges'])->name('showUserColleges');// Show details
        Route::get('/show-admitcard/{applicant}', [ApplicantController::class, 'showAdmitCard'])->name('show-admitcard');// Show details
        // Toggle status to submitted (status = 2)
        Route::patch('/{id}/toggle-status', [ApplicantController::class, 'toggleStatus'])->name('toggle-status');
        Route::patch('/{id}/admin-toggle-status', [ApplicantController::class, 'adminToggleStatus'])->name('admin-toggle-status');
    });
    // ===============================
    // User Management Routes
    // ===============================
    // Index: List all users
    Route::get('users-list', [UserController::class, 'index'])->name('users-list.index');

    // Create: Show form to create a new user
    Route::get('users-list/create', [UserController::class, 'create'])->name('users-list.create');

    // Store: Handle POST to create new user
    Route::post('users-list', [UserController::class, 'store'])->name('users-list.store');

    // Show: Display a specific user
    Route::get('users-list/{user}', [UserController::class, 'show'])->name('users-list.show');

    // Edit: Show form to edit an existing user
    Route::get('users-list/edit/{user}', [UserController::class, 'edit'])->name('users-list.edit');

    // Update: Handle PUT/PATCH to update an existing user
    Route::put('users-list/{user}', [UserController::class, 'update'])->name('users-list.update');
    Route::patch('users-list/{user}', [UserController::class, 'update']); // optional

    // Destroy: Delete a specific user (if you're using GET method for delete)
    Route::get('users-list/destroy/{user}', [UserController::class, 'destroy'])->name('users-list.destroy');



    // Toggle user status (e.g., activate/deactivate)
    Route::patch('users/{user}/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggle-status');
    // User profile
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
});


// forget password
Route::get('/forgot-password', [ForgotPasswordController::class, 'showEmailForm'])->name('forgot.password.form');
Route::post('/forgot-password/send-otp', [ForgotPasswordController::class, 'sendOtp'])->name('forgot.password.sendOtp');

Route::get('/verify-otp', [ForgotPasswordController::class, 'showOtpForm'])->name('forgot.password.otpForm');
Route::post('/verify-otp', [ForgotPasswordController::class, 'verifyOtp'])->name('forgot.password.verifyOtp');

Route::get('/reset-password', [ForgotPasswordController::class, 'showResetForm'])->name('forgot.password.resetForm');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('forgot.password.reset');

// Fallback page
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});