<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrueFalseQuestion extends Model
{
    protected $fillable = [
        'question',
        'quiz_id',
        'validity'
    ];
}
