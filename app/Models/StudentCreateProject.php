<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCreateProject extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'status',
        'position',
        'technologies',
        'topic',
        'descriptions',
        'supervisor',
        'sup_email',
        'company',
        'computer',
        'desk',
        'com_add',
        'start_date',
        'agr_status',
        'advisor',
        'userId',
        'schedule_status',
        'school'
    ];
}
