<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $primaryKey = 'answer_id';
    function questionaire(){
        return  $this->belongsTo(Questionaire::class,'question_id');
    }
}
