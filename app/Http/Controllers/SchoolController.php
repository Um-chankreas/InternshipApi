<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SchoolUser;
use App\Models\Advisorinfo;
class SchoolController extends Controller
{
    public function register(Request $req)
    {
        $fields = $req->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string',
        ]);
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'type'=> $req->type,
            'major'=>$req->major,
        ]);
        //add school user 
        $school = SchoolUser::create([
            'name' => $user['name'],
            'email' => $user['email'],
            'password' => bcrypt($fields['password']),
            'type'=> $user->type,
            'major'=>$user->major,
            'userid'=>$user->id,
        ]);
        $response = [
            'user' => $user,
            'school'=>$school,
        ];

        return response($response, 200);

    }

    // School Show Advisor Rating
    public function rating()
    {
        $rating = Advisorinfo::all();
        $response = [
            'data'=>$rating,
        ];
        return response($response, 201);
    }
}
