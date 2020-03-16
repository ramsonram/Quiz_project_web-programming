<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function show(\App\Questionnaire $questionnaire, $sulg)
    {
        $questionnaire->load('questions.answers');
        return view('quiz.shows', compact('questionnaire'));
    }

}
