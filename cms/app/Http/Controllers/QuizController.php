<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\TrueFalseQuestion;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function store($data)
    {

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
    public function dataTest()
    {
        $validated = request()->validate([
            'category' => 'required|min:3|max:40',
            'name' => 'required|min:3|max:80',
            'public' => 'required'
        ]);

        $quiz = Quiz::create([
            'category' => $validated['category'],
            'name' => $validated['name'],
            'public' => $validated['public']
        ]);
        
        return view('welcome');
    }

}
