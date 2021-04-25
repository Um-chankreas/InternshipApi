<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRequestDadvisor extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'advisor_id',
        'advisor_user_id',
        'advisor_name',
        'student_name',
        'student_id',
        'student_user_id',
        'status',
    ];
}
