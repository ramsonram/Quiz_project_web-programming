<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use \App\Question;

class Questionnaire extends Model
{
    protected $guarded = [];


    // มาจาก User.php
    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
   
    public function path()
    {
        return url('/questionnaires/'. $this->id);
    }

    public function publicPath()
    {
        return url('/quiz/'.$this->id.'-II-'.Str::slug($this->title));
        //return url('/surveys/'.$this->id.'-'.Str::slug($this->title));
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

}
