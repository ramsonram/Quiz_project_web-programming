<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\SurveyResponse;
use \App\Correct;
use Illuminate\Support\Facades\DB;

class CheckController extends Controller
{

    public function show(Correct $correct)
    {
        $data = request()->validate([

            'responses.*.answer_id' => 'required',
            'responses.*.question_id' => 'required',

        ]);

        // $check = DB::table('questions')->select('questionnaire_id', 'correct')->where('questionnaire_id', "=", 1)->get();
        // echo $check;

        $score = 0;
        foreach($data as $key => $value){
            $x =0;
            foreach($value as $a => $b){

                $check = DB::table('questions')->select('questionnaire_id', 'correct')->where('questionnaire_id', "=", $b['question_id'])->get();

                    if ($check[$x]->correct == $b['answer_id']){
                        $score += 1;
                    }

                $x += 1;
                
            }
        }
      
        return view('check.showscore', compact('score'));




        // $check = DB::table('corrects')->select('question_id', 'correct')->where('question_id', "=", '4')->get();

        // foreach($check as $key){
        //     echo $key->question_id, $key->correct .'<br>';
        // }


        //print_r($data);
        //echo $correct[0];

        // foreach($correct as $value){
        //     // foreach($value as $aa){
        //     //     echo $aa;
        //     // }
        //     echo $value->question_id . "<br>";
        //     echo $value->correct . "<br>";
        // }
        //echo $correct[0]->correct;
        // $score = 0;

        // foreach($data as $key => $value){
        //     $x =0;
        //     foreach($value as $a => $b){

        //         if($b['answer_id'] == $correct[$x]->correct){
                
        //             $score += 1;
        //         }
            
        //         // print_r($b['question_id'] . '<br>');
        //         // print_r($b['answer_id'] . '<br>');

        //         $x += 1;
        //     }
        // }
        // echo $score;

    }

}
