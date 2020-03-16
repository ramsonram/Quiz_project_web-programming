<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;
use App\Questionnaire;
use App\Question;
use Illuminate\Support\Facades\DB;

class QuestionnaireController extends Controller
{
    //--ตรวจสอบ ว่าถ้ายังไม่ login ก็เด้งเข้าหน้าลอกอิน
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questionnaire.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'title' => 'required',
            'purpose'   => 'required'
        ]);

        // บันทึกข้อมูล 
        // $data['user_id'] = auth()->user()->id;
        // $questionnaire = \App\Questionnaire::create($data);
        $questionnaire = auth()->user()->questionnaires()->create($data);


        return redirect('/questionnaires/' . $questionnaire->id)->with('success', 'สร้างชุดข้อสอบแล้ว');
    }
    public function shows(\App\Questionnaire $title_name)
    {
        $title_name->load('questions.answers');
        //dd($title_name);

        return view('questionnaire.show', compact('title_name'));
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
        $questionnaire = Questionnaire::find($id);
        //dd($questionnaire);
        return view('questionnaire.edit', compact('questionnaire', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'    => 'required',
            'purpose'     => 'required'
        ]);

        $questionnaire = Questionnaire::find($id);
        $questionnaire->title = $request->get('title');
        $questionnaire->purpose = $request->get('purpose');
        $questionnaire->save();

        return redirect()->route('home')->with('success','Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Questionnaire $questionnaire)
    {

        $questionnaire_id = $questionnaire->id;
        $question = DB::table('questions')->select('*')->where('questionnaire_id', "=", $questionnaire_id )->get();


        if(empty($question[0]->id)) {
            $question_id = 0;

        }else{
            $question_id = $question[0]->id;

        }

        
        $answer = DB::table('answers')->where('question_id', '=', $question_id)->delete();
        $questionnaire->questions()->delete();
        $questionnaire->delete();


        return redirect('/home');
    }

    
}
