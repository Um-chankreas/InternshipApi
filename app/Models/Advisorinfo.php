<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advisorinfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'major',
        'userid',
        'advisorId',
        'phone',
        'skill',
        'advise',
        'mcacc',
        'tech',
    ];
}
