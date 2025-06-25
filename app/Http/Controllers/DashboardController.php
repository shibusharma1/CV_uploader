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
        $maleUsers = Applicant::where('gender', 0)->count();
        $femaleUsers = Applicant::where('gender', 1)->count();
        $otherUsers = Applicant::where('gender', 2)->count();

        // Scholarship group options
        $scholarshipGroups = [
            'madhesi',
            'vepata',
            'jehendar',
            'bipanna',
            'janjati',
            'apanga',
            'shahid',
            'dalit',
        ];
        $scholarshipCounts = [];

        foreach ($scholarshipGroups as $group) {
            $scholarshipCounts[] = Applicant::where('scholarship_group', $group)->count();
        }

        return view('admin.dashboard', [
            'user' => Auth::user(),
            'users' => $users,
            'applicants' => $applicants,
            'pendingApplicants' => $pendingApplicants,
            'maleUsers' => $maleUsers,
            'femaleUsers' => $femaleUsers,
            'otherUsers' => $otherUsers,
            'scholarshipGroups'=> $scholarshipGroups,
            'scholarshipCounts'=> $scholarshipCounts,
        ]);
    }

    public function user()
    {
        return view('user.dashboard', ['user' => Auth::user()]);
    }
}
