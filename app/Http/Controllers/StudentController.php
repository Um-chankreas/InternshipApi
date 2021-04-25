<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\student;
use App\Models\StudentDeatil;
use App\Models\StudentCreateProject;
use App\Models\StudentRequestDadvisor;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    private $response = [
        'message' => null,
        'data'  => null,
    ];
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
            'type' => $req->type,
            'major' => $req->major,
        ]);
        //add Advisor user 
        $student = student::create([
            'name' => $user['name'],
            'email' => $user['email'],
            'password' => bcrypt($fields['password']),
            'type' => $user->type,
            'major' => $user->major,
            'userid' => $user->id,
        ]);

        $student_detail = StudentDeatil::create([
            'name' => $req->name,
            'email' => $req->email,
            'userid' => $user->id,
            'studentid' => $student->id,
            'major' => $req->major,
        ]);
        $project = StudentCreateProject::create([
            'name' => $req->name,
            'email' => $req->email,
            'userId' => $user->id,
        ]);
        $response = [
            'user' => $user,
            'student' => $student,
            'project' => $project,
            'student_detail' => $student_detail,
        ];

        return response($response, 201);
    }
    public function create_project(Request $req)
    {
        $data = array(
            'phone' => $req->phone,
            'status' => $req->status,
            'position' => $req->position,
            'technologies' => $req->technologies,
            'topic' => $req->topic,
            'descriptions' => $req->descriptions,
            'supervisor' => $req->supervisor,
            'sup_email' => $req->sup_email,
            'company' => $req->company,
            'computer' => $req->computer,
            'desk' => $req->desk,
            'com_add' => $req->com_add,
            'start_date' => $req->start_date,
            'agr_status' => $req->agr_status,
            'advisor' => $req->advisor,
            'userId' => $req->userId,
            'astatus' => "1",
        );

        $topic = $req->topic;
        $company = $req->company;
        $advisor = $req->advisor;
        $userId = $req->userId;
        $status = "1";
        DB::table('student_create_projects')->where('userId', $userId)->update($data);
        DB::update(' UPDATE student_deatils set topic=?,company=?,advisor=? where userId=?', [
            $topic, $company, $advisor, $userId, $status
        ]);

        return response()->json(['status_code' => 200, 'message' => 'success']);
    }
    public function show_project()
    {
        $project = StudentCreateProject::all();
        return response()->json($project, 200);
    }
    public function show_projectid($id)
    {
        $project = StudentCreateProject::find($id);
        return response()->json($project, 200);
    }
    // Student Show Project 
    public function student_show_project()
    {
        $project = StudentCreateProject::all();
        return response()->json(["data" => $project], 200);
    }
    public function get_student()
    {
        $project = DB::table('students')
            ->join('student_create_projects', 'students.userid', '=', 'student_create_projects.userId')
            ->select('students.*', 'student_create_projects.*')
            ->get();
        $this->response['message'] = "List Project";
        $this->response['data'] = $project;
        return response()->json($this->response, 200);
    }
    // Student Request Advisor
    public function studentRequestadvisor(Request $req)
    {
        $data = StudentRequestDadvisor::create([
            'advisor_id' => $req->advisor_id,
            'advisor_user_id' => $req->advisor_user_id,
            'advisor_name' => $req->advisor_name,
            'student_name' => $req->student_name,
            'student_id' => $req->student_id,
            'student_user_id' => $req->student_user_id,

        ]);
        $this->response['message'] = "Requested";
        $this->response['data'] = $data;
        return response()->json($this->response, 200);
    }
}
