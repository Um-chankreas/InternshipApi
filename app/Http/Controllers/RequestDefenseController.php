<?php

namespace App\Http\Controllers;

use App\Mail\RejectReuestDefenseMail;
use App\Mail\RequestDefenseMail;
use App\Models\RequestDefense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class RequestDefenseController extends Controller
{
    public function requestdefense(Request $request)
    {
        $defense = RequestDefense::create([
            'student_userid' => $request->student_userid,
            'student_name' => $request->student_name,
            'student_id' => $request->student_id,
            'advisor_id' => $request->advisor_id,
            'advisor_userid' => $request->advisor_userid,
            'advisor_name' => $request->advisor_name,
            'status' => "0",
            'appointmentid' => $request->id,
            'student_email' => $request->student_email,
            'advisor_email' => $request->advisor_email,
        ]);
        $id = $request->id;
        $data = array(
            'request_defense_status' => "1",
        );
        if (!$defense) {
            return response()->json("Bad Request", 401);
        }
        DB::table('make_appointments')->where('id', $id)->update($data);
        return response()->json($defense, 200);
    }
    public function show_request_defense()
    {
        $show = DB::table('request_defenses')
            ->join('student_create_projects', 'request_defenses.student_userid', '=', 'student_create_projects.userId')
            ->select(
                'request_defenses.*',
                'student_create_projects.generate',
                'student_create_projects.school',
                'student_create_projects.topic',
                'student_create_projects.technologies',
                'student_create_projects.company',
                'student_create_projects.start_date',
                'student_create_projects.advisor',
                'student_create_projects.defensedate'
            )
            ->get();
        return response()->json($show, 200);
    }
    public function advisor_confirm_defense(Request $request)
    {
        $defense = array(
            'status' => "1",
        );
        $appointment = array(
            'request_defense_status' => "2",
        );
        $id = $request->id;
        $appointid = $request->appointmentid;
        $student_email = $request->student_email;
        DB::table('make_appointments')->where('id', $appointid)->update($appointment);
        DB::table('request_defenses')->where('id', $id)->update($defense);
        Mail::to($student_email)->send(new RequestDefenseMail());
        return response()->json("succses", 200);
    }
    public function advisor_reject_defense(Request $request)
    {
        $defense = array(
            'status' => "2",
        );
        $appointment = array(
            'request_defense_status' => "3",
            'reason_reject_defense' => $request->reason_reject_defense,
        );
        $id = $request->id;
        $appointid = $request->appointmentid;
        $student_email = $request->student_email;
        DB::table('make_appointments')->where('id', $appointid)->update($appointment);
        DB::table('request_defenses')->where('id', $id)->update($defense);
        Mail::to($student_email)->send(new RejectReuestDefenseMail());
        return response()->json("Rejected", 200);
    }
}
