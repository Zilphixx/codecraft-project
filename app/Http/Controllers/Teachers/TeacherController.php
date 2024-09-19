<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\Teacher\NotifyTeacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    /**
     * Display a listing of verified teachers.
     */
    public function verifiedTeachers()
    {
        return view('admin.verified-teachers');
    }

    /**
     * Display a listing of unverified teachers.
     */
    public function unverifiedTeachers()
    {
        return view('admin.unverified-teachers');
    }

    /**
     * request for teachers list 
     * to display in datatable
     */
    public function teachersList($condition)
    {
        $results = User::getAllTeacher($condition)->get();
        $data = [];

        foreach ($results as $result) {
            $data[] = [
                'id' => $result->id,
                'name' => $result->userDetail->first_name,
                'email' => $result->email,
                'phone_number' => $result->userDetail->phone_number,
                'id_path' => str_replace('teachers-attachments/', '', $result->userDetail->file_path)
            ];
        }
        
        return response()->json([
            'data' => $data
        ]);
    }

    /**
     * Show file attachments
     */
    public function viewFile($file)
    {
        // Check if the file exists
        if (!Storage::disk('teacher-id')->exists($file)) {
            abort(404);
        }

        return response()->file(Storage::disk('teacher-id')->path($file));
    }

    /**
     * Do teacher verification base on action
     * passed as post data
     */
    public function verifyTeacher(Request $request)
    {
        $data = $request->all();

        $teacher = User::findOrFail($data['id']);

        if($data['action'] === 'Approve') {
            $content = [
                'message' => 'Your application has been approved. Click on the button below to login with your account.',
                'url' => url('/login'),
                'action' => 'Login'
            ];

            $teacher->notify(new NotifyTeacher($content));

            $teacher->update([
                'is_verified' => true
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Teacher has been approved.'
            ]);

        } else {
            $content = [
                'message' => "Your application has been rejected. Reason being: {$data['message']}. You can register again just click on the button below.",
                'url' => url('/register'),
                'action' => 'Login'
            ];
            $teacher->notify(new NotifyTeacher($content));

            $teacher->delete();

            return response()->json([
                'success' => true,
                'message' => 'Teacher has been rejected.'
            ]);
        }

        
    }

}
