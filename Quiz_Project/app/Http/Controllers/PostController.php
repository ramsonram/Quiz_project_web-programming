<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store()
    {

    
        $data = request()->validate([
            'details' => 'required',
            'color'   => 'required'
        ]);


        // บันทึกข้อมูล 
        $data['user_id'] = auth()->user()->id;
        $post = \App\Post::create($data);

        return redirect('/');
        //$questionnaire = auth()->user()->questionnaires()->create($data);
        
    }

    public function delete(Post $post_id)
    {
        $post_id->delete();
        return redirect('/home');
    }

}
