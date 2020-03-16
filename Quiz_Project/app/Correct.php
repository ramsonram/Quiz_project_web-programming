<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correct extends Model
{
    protected $guarded = [];

    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

        // มาจาก User.php
        // public function user()
        // {
        //     $this->belongsTo(User::class);
        // }
    
        // public function questions()
        // {
        //     return $this->hasMany(Question::class);
        // }
    
        // public function questions2()
        // {
        //     return $this->hasMany(Question2::class);
        // }
    
        // public function surveys()
        // {
        //     return $this->hasMany(Survey::class);
        // }
    
        // public function path()
        // {
        //     return url('/questionnaires/'. $this->id);
        // }
    
}
