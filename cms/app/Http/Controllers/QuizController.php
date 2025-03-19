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
        $Choice = $request->questionse[0];
        $Connect = $request->questions[1];
        $TrueFalse = $request->questions[2];

        $quiz = Quiz::create([
            'category' => $request->category,
            'name' => $request->title,
            'public' => +$request->public,
            'user_id' => $request->user_id
        ]);

        foreach ($Choice as $q) {
            ChoiceQuestion::create([
                'question' => $q[0],
                'type' => $q[1],
                'answers' => $q[2],
                'correct_answers'=> $q[3],
                'quiz_id' => $quiz->id
            ]);
        }

        foreach ($Connect as $q) {
            ConnectionQuestion::create([
                'question' => $q[0],
                'first_half' => $q[1],
                'second_half' => $q[2],
                'quiz_id' => $quiz->id
            ]);
        }

        foreach ($TrueFalse as $q) {
            TrueFalseQuestion::create([
                'question' => $q[0],
                'validity' => +$q[1],
                'quiz_id' => $quiz->id
            ]);
        }
        return response()->json([
            'response' => $quiz
        ]);
    }
    public function get_quizzes()
    {
        $quiz = Quiz::query()->orderBy('views', 'DESC')->take('15');

        return response()->json([
           'response' => $quiz
        ]);
    }
    public function search(Request $request) {
        $request->name;
        $request->category;
        $request->sortBy; // views/favorites
        $request->sortDir; // ASC/DESC
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

        return response("success");
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
