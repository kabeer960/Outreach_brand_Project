<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\Questionaire;
use App\Http\Requests\SurveyStoreRequest;

class SurveysController extends Controller
{
    function show_surveys(){
        $data = Survey::all();
        $qdata = Questionaire::all();
        return view('Engagement.surveys.surveys', ['items' => $data, 'members' => $qdata]);
    }

    function edit_survey($sur_id){
        $data  = Survey::with('questionaire')->find($sur_id);
        return response()->json($data);
    }
    function survey_store(SurveyStoreRequest $req){
        if($req->survey_id != ''){
            $data = Survey::find($req->survey_id);
        }else{
            $data = new Survey();
        }
        $data->survey_code = $req->survey_code;
        $data->survey_name = $req->survey_name;
        $data->survey_description = $req->survey_description;
        $data->survey_status = $req->survey_status;
        $data->question_id = $req->question_id;
        $data->save();
        $rdata = Survey::with('questionaire')->find($data->survey_id);
        return response()->json($rdata);
    }

    function delete_survey($sur_id){
        $data = Survey::find($sur_id);
        $data->delete();
        return response()->json($data);
    }

}
