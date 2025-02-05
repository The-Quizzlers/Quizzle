<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quiz extends Model
{
    protected $fillable = [
        'public',
        'category',
        'name',
        'views',
        'favourites',
        'user_id'
        ];
    public function choiceQuestions(): HasMany
    {
        return $this->hasMany(ChoiceQuestion::class, 'quiz_id', 'id');
    }
    public function TFQuestions(): HasMany
    {
        return $this->hasMany(TrueFalseQuestion::class, 'quiz_id', 'id');
    }
    public function connectQuestions(): HasMany
    {
        return $this->hasMany(ConnectionQuestion::class, 'quiz_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
