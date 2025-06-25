<?php

use App\Models\Auth\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserContoller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\DashboardController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/test', function () {
    return view('test');
});
Route::prefix('applicants')->group(function () {
    Route::get('/', [ApplicantController::class, 'index'])->name('applicants.index');       // List all applicants
    Route::get('/create', [ApplicantController::class, 'create'])->name('applicants.create'); // Show create form
    Route::post('/', [ApplicantController::class, 'store'])->name('applicants.store');      // Store new applicant
    Route::get('/{applicant}/edit', [ApplicantController::class, 'edit'])->name('applicants.edit'); // Edit form
    Route::put('/{applicant}', [ApplicantController::class, 'update'])->name('applicants.update');   // Update applicant
    Route::delete('/{applicant}', [ApplicantController::class, 'destroy'])->name('applicants.destroy'); // Delete applicant
    Route::get('/show/{applicant}', [ApplicantController::class,'show'])->name('applicants.show'); // Show applicant details

});

Route::resource('users', UserController::class);
// Optional: a separate route for status toggle
Route::patch('users/{user}/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggle-status');

Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');




// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
// Route::post('/login', [AuthController::class, 'login']);
// Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register')->middleware('guest');
// Route::post('/register', [AuthController::class, 'register']);
// Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// // Dashboard Routes (role-based)
// Route::middleware(['auth', 'verified'])->group(function() {
//         Route::get('/dashboard/admin', [DashboardController::class, 'admin'])->name('admin.dashboard');
//     Route::get('/dashboard/user', [DashboardController::class, 'user'])->name('user.dashboard');
//    Route::resource('personal-details', PersonalDetailController::class)->middleware('auth');
// });

// // Email Verification routes
// Route::get('/email/verify', function () {
//     return view('auth.verify-email'); // Blade file shown to unverified users
// })->middleware('auth')->name('verification.notice');

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();

//     // After email verified - send custom registration success email
//     \App\Mail\RegistrationSuccess::sendAfterVerification($request->user());

//     return redirect('/dashboard/user');
// })->middleware(['auth', 'signed'])->name('verification.verify');

// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();
//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Dashboard (only for verified users)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/user', [DashboardController::class, 'user'])->name('user.dashboard');

});
Route::get('/dashboard/admin', [DashboardController::class, 'admin'])->name('admin.dashboard');
Route::resource('admins', AdminController::class);

// Email Verification Routes
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard/user');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
