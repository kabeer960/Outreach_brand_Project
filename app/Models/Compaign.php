<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compaign extends Model
{
    use HasFactory;
    protected $primaryKey = 'compaign_id';
    function survey(){
        return  $this->belongsTo(Survey::class,'survey_id');
    }
}
