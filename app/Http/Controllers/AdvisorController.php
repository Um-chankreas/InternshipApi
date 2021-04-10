<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Advisorinfo;
use App\Models\Advisor;
class AdvisorController extends Controller
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
        $advisor = Advisor::create([
            'name' => $user['name'],
            'email' => $user['email'],
            'password' => bcrypt($fields['password']),
            'type'=> $user->type,
            'major'=>$user->major,
            'userid'=>$user->id,
        ]);
        $advisor_info = Advisorinfo::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($fields['password']),
            'type'=> $req->type,
            'major'=>$req->major,
            'userid'=>$user->id,
            'advisorId'=>$advisor->id,
            'phone'=>$req->phone,
            'skill'=>$req->skill,
            'advise'=>$req->advise,
            'mcacc'=>$req->mcacc,
            'tech'=>$req->tech,
        ]);
        $response = [
            'user' => $user,
            'advisor'=>$advisor,
            'advisor_info'=>$advisor_info,
        ];

        return response($response, 201);

    }
    
}
