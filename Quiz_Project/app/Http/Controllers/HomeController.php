<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $questionnaires = auth()->user()->questionnaires;
        $user_id = auth()->user()->id;

        $post = DB::table('posts')->select('id', 'user_id', 'details')->where('user_id', "=", $user_id)->get();

        $post_cout = count($post);
        $questionnarie_count = count($questionnaires);



        
        return view('home', compact('questionnaires','questionnarie_count','post_cout','post'));
    }

}
