<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId        = Auth::id();

        $jobCount      = Job::where('created_by', $userId)->count();

        $employerCount = Employer::where('created_by', $userId)->count();

        $employeeCount = Employee::where('created_by', $userId)->count();

        $userCount     = User::count();

        return view('dashboard',compact(
            'jobCount',
            'employeeCount',
            'employerCount',
            'userCount',
        ));
    }
}
