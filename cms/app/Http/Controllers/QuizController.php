<?php

namespace App\Http\Controllers;

use App\Models\ChoiceQuestion;
use App\Models\ConnectionQuestion;
use App\Models\Quiz;
use App\Models\TrueFalseQuestion;
use Illuminate\Http\Request;
class QuizController extends Controller
{
    public function store(Request $request)
    {
        $quiz = Quiz::create([
            'category' => $request->category,
            'name' => $request->name,
            'public' => +$request->public,
            'user_id' => $request->user_id
        ]);
        return response()->json([
            'quiz' => $quiz
        ]);
    }
    public function get_quiz(Request $request)
    {
        $quiz = Quiz::where('id', $request->id)->get();

        $TF = TrueFalseQuestion::where('quiz_id', $request->id)->get();
        $Choice = ChoiceQuestion::where('quiz_id', $request->id)->get();
        $Connect = ConnectionQuestion::where('quiz_id', $request->id)->get();

        return response()->json([
            'quiz' => $quiz,
            'questions' => [
                'TrueFalse' => $TF,
                'Choice' => $Choice,
                'Connect' => $Connect
            ]
        ]);
    }
    public function delete(Request $request)
    {
        Quiz::where('id', $request->id)->delete();

        TrueFalseQuestion::where('quiz_id', $request->id)->delete();
        ChoiceQuestion::where('quiz_id', $request->id)->delete();
        ConnectionQuestion::where('quiz_id', $request->id)->delete();
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

        return response()->json($quiz);
    }

}
