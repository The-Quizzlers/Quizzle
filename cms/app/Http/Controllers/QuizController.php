<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\TrueFalseQuestion;
use Illuminate\Http\JsonResponse;
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

        return response()->json($quiz);
    }
    public function dataTest(Request $request)
    {
        $quiz = Quiz::create([
            'category' => $request->category,
            'name' => $request->name,
            'public' => +$request->public
        ]);

        return response() -> json($quiz);
    }

}
