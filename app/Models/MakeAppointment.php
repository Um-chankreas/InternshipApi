<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MakeAppointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'meet_date',
        'student_userid',
        'student_name',
        'student_id',
        'desciption',
        'advisor_id',
        'advisor_userid',
        'advisor_name',
        'status',
        'student_email',
        'advisor_email',
        'request_defense_status',
        'reason_reject_defense'
    ];
}
