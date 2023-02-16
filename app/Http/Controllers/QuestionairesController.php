<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questionaire;
use App\Models\Survey;
use App\Http\Requests\QuestionairesStoreRequest;

class QuestionairesController extends Controller
{
    function show_questionaires($sid){
        $data = Survey::find($sid)->questionaire;
        return view('engagement.questionaires.questionaires', ['items' => $data]);
    }

    function edit_questionaire($que_id){
        $data = Questionaire::with('survey')->find($que_id);
        return response()->json($data);
    }

    function store_questionaires(QuestionairesStoreRequest $req){
        if($req->question_id != ''){
            $data = Questionaire::find($req->question_id);
        }else{
            $data = new Questionaire();
        }
        $data->question_id = $req->question_id;
        $data->question_code = $req->question_code;
        $data->question_name = $req->question_name;
        $data->question_description = $req->question_description;
        $data->question_status = $req->question_status;
        $data->survey_id = $req->survey_id;
        $data->save();
        $sdata = questionaire::with('survey')->find($data->question_id);
        return response()->json($sdata);
    }

    function delete_questionaire($que_id){
        $data = Questionaire::find($que_id);
        $data->delete();
        return response()->json($data);
    }
}
