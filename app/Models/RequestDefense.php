<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestDefense extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_userid',
        'student_name',
        'student_id',
        'advisor_id',
        'advisor_userid',
        'advisor_name',
        'status',
        'student_email',
        'advisor_email',
        'appointmentid',
    ];
}
