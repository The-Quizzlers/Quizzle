<?php

namespace App\Http\Controllers;

use App\Models\ChoiceQuestion;
use App\Models\ConnectionQuestion;
use App\Models\TrueFalseQuestion;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function trueFalse(Request $request)
    {
        $TF = TrueFalseQuestion::create([
            'question' => $request->question,
            'validity' => +$request->true,
            'quiz_id' => $request->quiz_id
        ]);
    }
    public function choice(Request $request)
    {
        $Choice = ChoiceQuestion::create([
            'question' => $request->question,
            'quiz_id' => $request->quiz_id,
            'type' => $request->type,
            'answers' => $request->answers,
            'correct_answers'=> $request->correct_answers
        ]);
    }
    public function connect(Request $request)
    {
        $Connect = ConnectionQuestion::create([
            'question' => $request->question,
            'first_half' => $request->first_half,
            'second_half' => $request->second_half,
            'quiz_id' => $request->quiz_id
        ]);
    }
}
