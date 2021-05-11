<?php

namespace App\Http\Controllers;

use App\Models\MakeAppointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\OfferMail;

class MakeAppointmentController extends Controller
{
    // Student Make Appointment
    public function request(Request $request)
    {
        $data = MakeAppointment::create([
            'meet_date' => $request->meet_date,
            'student_userid' => $request->student_userid,
            'student_name' => $request->student_name,
            'advisor_userid' => $request->advisor_userid,
            'advisor_email' => $request->advisor_email,
            'student_email' => $request->student_email,
            'desciption' => $request->desciption,
            'status' => "0",
        ]);
        return response()->json($data, 200);
    }
    // Adviosr Make Appointment
    public function advisor_make_app(Request $request)
    {
        $data = MakeAppointment::create([
            'meet_date' => $request->meet_date,
            'advisor_userid' => $request->advisor_userid,
            'student_userid' => $request->student_userid,
            'advisor_name' => $request->advisor_name,
            'advisor_email' => $request->advisor_email,
            'student_email' => $request->student_email,
            'desciption' => $request->desciption,
            'status' => "0",
        ]);
        return response()->json($data, 200);
    }

    public function show_app()
    {
        $app = MakeAppointment::all();
        return response()->json($app, 200);
    }
    public function confirm_app(Request $request)
    {
        $data = array(
            'status' => "2",
        );
        $offer = [
            'title' => 'Deals of the Day',
            'url' => 'https://www.remotestack.io'
        ];
        $stu_email = $request->student_email;
        $adv_email = $request->advisor_email;
        if ($stu_email) {
            Mail::to($stu_email)->send(new OfferMail($offer));
        } elseif ($adv_email) {
            Mail::to($adv_email)->send(new OfferMail($offer));
        }
        $accept = DB::table('make_appointments')->where('id', $request->id)->update($data);

        return response()->json($accept, 200);
    }
}
