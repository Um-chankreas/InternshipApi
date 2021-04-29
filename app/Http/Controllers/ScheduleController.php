<?php

namespace App\Http\Controllers;

use App\Models\CreateRoom;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\student;
use App\Models\StudentDeatil;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    private $response = [
        'message' => null,
        'data'  => null,
    ];
    public function showroom()
    {
        $room = Schedule::all()->groupBy('room');
        $rooms = $room->map(function ($item, $key) {
            return ["room" => $key, "data" => $item];
        });
        $data = [];

        foreach ($rooms as $value) {
            array_push($data, $value);
        }
        $this->response['message'] = "List Room";
        $this->response['data'] = $data;
        return response()->json($this->response, 200);
    }
    public function show_schedule()
    {
        $data = Schedule::all();

        return response()->json($data, 200);
    }
    // School Create Room date  for Defense
    public function create_room(Request $request)
    {
        $room = CreateRoom::create([
            'room' => $request->room,
            'date_defense' => $request->date_defense,
            'school' => $request->school,
        ]);
        $this->response['message'] = "Create Success!";
        $this->response['data'] = $room;
        return response()->json($this->response, 200);
    }
    public function showroom_defense()
    {
        $room = CreateRoom::all();
        return response()->json($room, 200);
    }

    public function showroom_defense_byId($id)
    {
        $room = CreateRoom::where('id', "=", $id)->first();
        return response()->json($room, 200);
    }

    public function create(Request $req)
    {
        $student = student::where('email', $req->email)->first();
        $validator = Validator::make(
            $req->all(),
            [
                'studentName'  => 'required',
                'room'  => 'required',
                'generate'  => 'required',
                'email' => 'required',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status_code' => 500, 'message' => 'Bad Create']);
        } elseif (!$student) {
            return response()->json(['status_code' => 500, 'message' => 'Student don not have this email']);
        } else {

            $data = Schedule::create([
                'studentName' => $req->studentName,
                'room' => $req->room,
                'generate' => $req->generate,
                'defensedate' => $req->defensedate,
                'fromtime' => $req->fromtime,
                'totime' => $req->totime,
                'topic' => $req->topic,
                'email' => $req->email,
                'company' => $req->company,
                'advisor' => $req->advisor,
                'studentid' => $student->id,
                'type' => $req->type,
                'status' => '1',

            ]);
            $upproject = array(
                'room' => $req->room,
                'generate' => $req->generate,
                'defensedate' => $req->defensedate,
                'fromtime' => $req->fromtime,
                'totime' => $req->totime,
                'sstatus' => '1',
                'schedule_status' => '1',

            );

            $room = $data->room;
            $studentid = $student->id;
            $generate = $data->generate;
            $defensedate = $data->defensedate;
            $fromtime = $data->fromtime;
            $totime = $data->totime;
            $topic = $data->topic;
            $email = $req->email;
            $company = $data->company;
            $major = $data->major;
            $advisor = $data->advisor;
            DB::update(' UPDATE student_deatils set room=?,generate=? ,defensedate=?,fromtime=?,totime=?,topic=?,company=?,major=?,advisor=? where studentid=?', [
                $room, $generate,
                $defensedate, $fromtime, $totime, $topic, $company, $advisor, $major, $studentid
            ]);
            DB::table('student_create_projects')->where('email', $email)->update($upproject);
            // DB::update('UPDATE student_create_projects set sstatus=? where email=?',[$email,$sstatus]);
            return response()->json(['status_code' => 200, 'message' => 'success']);
        }
    }
    public function update(Request $req)
    {
        // $name = $req->studentName;
        //     $room = $req->room;
        //     $email = $req->email;
        //     $generate = $req->generate;
        //     $defensedate = $req->defensedate;
        //     $fromtime = $req->fromtime;
        //     $totime = $req->totime;
        //     $topic = $req->topic;
        //     $company = $req->company;
        //     $major = $req->tupe;
        //     $advisor = $req->advisor;
        $data = array(
            'studentName' => $req->studentName,
            'room' => $req->room,
            'generate' => $req->generate,
            'defensedate' => $req->defensedate,
            'fromtime' => $req->fromtime,
            'totime' => $req->totime,
            'topic' => $req->topic,
            'email' => $req->email,
            'company' => $req->company,
            'advisor' => $req->advisor,

        );
        $upproject = array(
            'room' => $req->room,
            'generate' => $req->generate,
            'defensedate' => $req->defensedate,
            'fromtime' => $req->fromtime,
            'totime' => $req->totime,

        );
        $email = $req->email;
        DB::table('student_create_projects')->where('email', $email)->update($upproject);
        if (DB::table('schedules')->where('email', $email)->update($data)) {
            return response()->json(['status_code' => 200, 'message' => 'success']);
        }
    }
    // Show Room Defense after create schedule

    // $room = $room->map(function($item, $key){
    //     return ["room"=>$key,"data"=>$item];
    //   });
    //   $data = $item['data']['data'];

    // Schow Show Cadidate for that have name defense
    public function listCaditate()
    {
        $student = StudentDeatil::all();
        $this->response['message'] = 'List Student';
        $this->response['data'] = $student;
        return response()->json($this->response, 200);
    }
}
