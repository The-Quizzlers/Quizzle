<?php

namespace App\Http\Controllers;

use App\Models\ConnectionQuestion;
use Illuminate\Http\Request;

class ConnectionQuestionController extends Controller
{
    public function store()
    {
        ConnectionQuestion::create([
            'question' => "test question",
            'first_half' => ["test", "test2"],
            'second_half' => ["test", "test2"]
        ]);
    }
}
