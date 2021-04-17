<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'studentName',
        'room',
        'generate',
        'defensedate',
        'fromtime',
        'totime',
        'topic',
        'company',
        'advisor',
        'email',
        'studentid',
        'type',
    ];
}
