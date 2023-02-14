<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    protected $primaryKey = 'survey_id';
    function questionaire(){
        return  $this->belongsTo(questionaire::class,'question_id');
    }
}
