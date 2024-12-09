<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'public',
        'category',
        'name',
        'views',
        'favourites'
        ];
    public function choiceQuestions()
    {
        return $this->hasMany(ChoiceQuestion::class, 'quiz_id', 'id');
    }
    public function TFQuestions()
    {
        return $this->hasMany(TrueFalseQuestion::class, 'quiz_id', 'id');
    }
    public function connectQuestions()
    {
        return $this->hasMany(ConnectionQuestion::class, 'quiz_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
