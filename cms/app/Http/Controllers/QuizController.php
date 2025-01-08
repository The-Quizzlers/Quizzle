<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\TrueFalseQuestion;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function __invoke()
    {
        // TODO: Implement __invoke() method.
    }

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

        return response() -> json($quiz);
    }
    public function dataTest($data)
    {
        $quiz = Quiz::create([
            'category' => $data->category,
            'name' => $data->name,
            'public' => $data->public
        ]);

        return response() -> json($quiz);
    }

    public function store()
    {

    }
}
