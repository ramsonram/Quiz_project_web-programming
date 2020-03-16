<?php

namespace App\Http\Controllers;

use App\Post;
use App\Question;
use Illuminate\Http\Request;
use App\Questionnaire;

class welcome extends Controller
{

    public function welcome()
    {
        $questionnaire = Questionnaire::all()->sortByDesc('id');
        $post = Post::all()->sortByDesc('id');
        return view('welcome', compact('questionnaire', 'post'));
    }
}
