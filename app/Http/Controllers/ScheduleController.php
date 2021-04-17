<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Schedule;
use App\Models\student;
use App\Models\StudentDeatil;
use Illuminate\Support\Facades\Validator;
use DB;
class ScheduleController extends Controller
{
    private $response=[
        'message'=>null,
        'data'  =>null,
    ];
    public function create(Request $req)
    {
        $student = student::where('email',$req->email)->first();
        $validator = Validator::make($req->all(),
        [
            'studentName'  => 'required',
            'room'  => 'required',
            'generate'  => 'required',
            'email' =>'required',
            'topic'  => 'required',
            'company'  => 'required',
            'advisor'  => 'required',
        ]);
        if($validator->fails())
        {
            return response()->json(['status_code'=>500,'message'=>'Bad Create']);
        }
        elseif(!$student)
        {
            return response()->json(['status_code'=>500,'message'=>'Student don not have this email']);
        }
        
        else{
            
            $data = Schedule::create([
                'studentName'=>$req->studentName,
                'room' =>$req->room,
                'generate'=>$req->generate,
                'defensedate'=>$req->defensedate,
                'fromtime' =>$req->fromtime,
                'totime'=>$req->totime,
                'topic'=>$req->topic,
                'email'=>$req->email,
                'company' =>$req->company,
                'advisor'=>$req->advisor,
                'studentid'=>$student->id,
                'type'=>$req->type,
                
            ]);
            $room = $data->room;
            $studentid=$student->id;
            $generate = $data->generate;
            $defensedate = $data->defensedate;
            $fromtime = $data->fromtime;
            $totime = $data->totime;
            $topic = $data->topic;
            $company = $data->company;
            $major = $data->major;
            $advisor = $data->advisor;
            DB::update(' UPDATE student_deatils set room=?,generate=? ,defensedate=?,fromtime=?,totime=?,topic=?,company=?,major=?,advisor=? where studentid=?',[$room,$generate,
            $defensedate,$fromtime,$totime,$topic,$company,$advisor,$major,$studentid]);
            return response()->json(['status_code'=>200,'message'=>'success']);
        }
    }
    // Show Room Defense after create schedule
    public function showroom()
    {
        $room = Schedule::all()->groupBy('room');
        $room = Schedule::all();
        // comment code below uncomm
        // $room = $room->map(function($item, $key){
        //     return ["room"=>$key,"data"=>$item];
        //   });
        //   return response()->json($room,200);
        // foreach($room as $data["data"]){
        //     foreach($data["data"] as $key =>$value){
        //         if(isset($output[$key])){
        //             ($output[$key]=array());
        //         }  $this->response[$key][]=$value;
          
        
        //         return response()->json($value,200);
    
        //     }
        //     return response()->json($data["data"],200);
        //     dd($data["data"]);

           
        // }
        $this->response['message'] = 'List Student';
        $this->response['data']=$room;
        return response()->json($this->response,200);
        
    }
    // Schow Show Cadidate for that have name defense
    public function listCaditate()
    {
        $student = StudentDeatil::all();
        $this->response['message'] = 'List Student';
        $this->response['data']=$student;
        return response()->json($this->response,200);
    }
}
