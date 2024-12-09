<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChoiceQuestion extends Model
{
    protected $fillable = [
        'question',
        'quiz_id',
        'type',
        'answers',
        'correct_answers'
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
