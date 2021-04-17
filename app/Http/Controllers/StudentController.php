<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\student;
use App\Models\StudentDeatil;
class StudentController extends Controller
{
    public function register(Request $req)
    {
        $fields = $req->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string',
        ]);
        // Add Data to user Table
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'type'=> $req->type,
            'major'=>$req->major,
        ]);
        //add Advisor user 
        $student = student::create([
            'name' => $user['name'],
            'email' => $user['email'],
            'password' => bcrypt($fields['password']),
            'type'=> $user->type,
            'major'=>$user->major,
            'userid'=>$user->id,
        ]);
        $student_detail = StudentDeatil::create([
            'name' => $req->name,
            'email' => $req->email,
            'userid'=>$user->id,
            'studentid'=>$student->id,
            'major'=>$req->major,
        ]);
        $response = [
            'user' => $user,
            'student'=>$student,
            'student_detail'=>$student_detail,
        ];

        return response($response, 201);

    }
}
