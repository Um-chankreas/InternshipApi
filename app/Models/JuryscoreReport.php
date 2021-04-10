<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JuryscoreReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'presentation_skill',
        'content_org',
        'demonstration_and_question',
        'impression',
        'comment',
        'examiner',
    ];
}
