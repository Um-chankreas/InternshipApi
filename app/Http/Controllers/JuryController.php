<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Juryuser;
use App\Models\Schedule;
use App\Models\JuryscoreReport;
use Illuminate\Support\Facades\DB;

class JuryController extends Controller
{
    private $response = [
        'message'   => null,
        'data'  => null,
    ];
    public function register(Request $req)
    {
        $fields = $req->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string',
        ]);
        // add to user table
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'type' => $req->type,
            'major' => $req->major,
            'room' => $req->room,
        ]);
        //add jury user 
        $jury = Juryuser::create([
            'name' => $user['name'],
            'email' => $user['email'],
            'password' => bcrypt($fields['password']),
            'type' => $user->type,
            'major' => $user->major,
            'userid' => $user->id,
            'room' => $user->room,
        ]);
        $response = [
            'user' => $user,
            'school' => $jury,
        ];

        return response($response, 201);
    }
    public function score(Request $req)
    {
        $score = new JuryscoreReport();
        // score personal skill
        $qone = $req->input('qone');
        $qtwo = $req->input('qtwo');
        $qthree = $req->input('qthree');
        $qfour = $req->input('qfour');
        $qfive = $req->input('qfive');
        $sum = $qone + $qtwo + $qthree + $qfour + $qfive;

        $personal_skill = $req->input('presentation_skill');
        $personal_skill = $sum;
        // Score content org
        $qsix = $req->input('qsix');
        $qseven = $req->input('qseven');
        $qeight = $req->input('qeight');
        $qnine = $req->input('qnine');
        $sum = $qsix + $qseven + $qeight + $qnine;

        $content_org = $req->input('content_org');
        $content_org = $sum;
        // DEMONSTRATION AND QUESTION
        $qten = $req->input('qten');
        $qele = $req->input('qele');
        $qtwele = $req->input('qtwele');
        $sum = $qten + $qele + $qtwele;

        $demonstaration = $req->input('demonstration_and_question');
        $demonstaration = $sum;
        // YOUR OVeral impression 
        $imprestion = $req->input('impression');
        $comment = $req->input('comment');
        $examiner = $req->input('examiner');
        $studentid = $req->input('studentid');
        $studentName = $req->input('stundentName');
        $data = array('presentation_skill' => $personal_skill, "content_org" => $content_org, "demonstration_and_question" => $demonstaration, "impression" => $imprestion, "comment" => $comment, "examiner" => $examiner, 'stundentName' => $studentName, 'studentid' => $studentid);
        DB::table('juryscore_reports')->insert($data);
        // }
        return response()->json(['status_code' => 200, 'message' => 'success']);
    }
    public function get_score()
    {
        $score_defense = JuryscoreReport::all();
        return response()->json(["data" => $score_defense]);
    }
    public function listStudentDefense()
    {
        // $user = auth()->user();
        $room = Schedule::all();
        $this->response['message'] = 'List room of schedule';
        $this->response['data'] = $room;
        return response()->json($this->response, 200);
    }
    public function listscore()
    {
        $room = JuryscoreReport::all();
        $this->response['message'] = 'List Score';
        $this->response['data'] = $room;
        return response()->json($this->response, 200);
    }
}
