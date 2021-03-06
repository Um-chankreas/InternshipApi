<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDeatil extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'userid',
        'room',
        'generate',
        'defensedate',
        'fromtime',
        'totime',
        'topic',
        'company',
        'advisor',
        'studentid',
        'major',
    ];
}
