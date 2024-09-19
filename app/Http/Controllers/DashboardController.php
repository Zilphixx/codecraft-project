<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the dashboard base on user type.
     */
    public function index()
    {
        $user = Auth::user();

        switch($user->user_type) 
        {
            case 'Student':
                return view('students.dashboard');
                break;

            case 'Teacher':
                return view('teachers.dashboard');
                break;

            case 'Admin':

                $data = [
                    'verifiedTeacherCount' => User::getAllTeacher(true)->count(),
                    'unverifiedTeacherCount' => User::getAllTeacher(false)->count(),
                    'studentCount' => User::getAllStudent()->count()
                ];

                return view('admin.dashboard', compact('data'));
                break;
        }

    }

}
