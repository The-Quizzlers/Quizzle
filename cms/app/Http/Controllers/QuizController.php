<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\TrueFalseQuestion;
use Illuminate\Http\Request;

class QuizController
{
    public function test()
    {
        $quiz = Quiz::create([
            'category' => "sports",
            'name'=> "test",
            'public' => false
        ]);

        TrueFalseQuestion::create([
            'question' => "Is this a test question?",
            'quiz_id' => $quiz->id,
            'validity' => true
        ]);

        return "success";
    }

    public function store()
    {

    }
}
