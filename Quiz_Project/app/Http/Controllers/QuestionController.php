<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;

use\App\Questionnaire;
use\App\Question;
use\App\Correct;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(\App\Questionnaire $title_id)
    {
        return view('question.create', compact('title_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Questionnaire $questions)
    {

        $data = request()->validate([
            'question.question' => 'required',
            'question.correct' => 'required',
            'answers.*.answer' => 'required',

        ]);

        //dd($questions->id);

        $question = $questions->questions()->create($data['question']);
        $question->answers()->createMany($data['answers']);


        // $question = $questions->questions()->create($data['question']);
        // $question->answers()->createMany($data['answers']);



        return redirect('/questionnaires/'.$questions->id);
    }

    public function aaa(){
        return 555;
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        $answer = DB::table('answers')->select('answer')->where('question_id', "=", $id)->get();

        $answers = json_decode($answer);

        //dd($answer);
        return view('question.edit', compact('question','answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function aa(){
        return 555;
    }
    public function update(Request $request, $id)
    {




        $data = request()->validate([
            'question.question' => 'required',
            'question.correct' => 'required',
            'answers.*.answer' => 'required',
        ]);

        //dd($data);
        $questions = DB::table('answers')->where('answer', $id)->get();
        
        $question = $questions->questions()->create($data['question']);
        $question->answers()->createMany($data['answers']);
    }

    /**
     * Remove the specified resource from stora
     */
    public function destroy(Questionnaire $questionnaire, Question $question)
    {

        $question->answers()->delete();
        $question->delete();

        return redirect($questionnaire->path());
    }



}
