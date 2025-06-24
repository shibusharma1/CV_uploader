<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function admin()
    {
        $users = User::count();
        $applicants = Applicant::count();
        $pendingApplicants = Applicant::where('status', 0)->count();
        // Pie Chart Data (User Genders)
        $maleUsers = User::where('gender', 1)->count();
        $femaleUsers = User::where('gender', 2)->count();
        $otherUsers = User::where('gender', 0)->count();

        // Line Chart Data (Applicants last 7 days)
        $last7Days = collect(range(0, 6))->map(function ($daysAgo) {
            return now()->subDays($daysAgo)->toDateString();
        })->reverse();

        $applicantsLast7Days = $last7Days->map(function ($date) {
        return Applicant::whereDate('created_at', $date)->count();
        });

return view('admin.dashboard', [
    'user' => Auth::user(),
    'users' => $users,
    'applicants' => $applicants,
    'pendingApplicants' => $pendingApplicants,
    'maleUsers' => $maleUsers,
    'femaleUsers' => $femaleUsers,
    'otherUsers' => $otherUsers,
    'last7Days' => $last7Days,
    'applicantsLast7Days' => $applicantsLast7Days,
]);
    }

    public function user()
    {
        return view('user.dashboard', ['user' => Auth::user()]);
    }
}
