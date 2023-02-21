<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionaire extends Model
{
    use HasFactory;
    protected $primaryKey = 'question_id';
    function survey(){
        return  $this->belongsTo(Survey::class,'survey_id');
    }

    function answer(){
        return $this->hasMany(Answer::class, 'question_id');
    }
}
