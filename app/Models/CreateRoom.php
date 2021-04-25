<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateRoom extends Model
{
    use HasFactory;
    protected $fillable = [
        'room',
        'date_defense',
        'school',
    ];
}
