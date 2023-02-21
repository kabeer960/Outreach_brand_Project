<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Questionaire;

class AnswerController extends Controller
{
    function show_answers($qid){
        $data = Questionaire::find($qid)->answer;
        $qdata = Questionaire::find($qid);
        return view('engagement.answers.answers', ['items' => $data, 'qitem' => $qdata]);
    }

    function edit_answer($sid){
        $data = Answer::with('questionaire')->find($sid);
        return response()->json($data);
    }

    function store(Request $req){
        if($req->answer_id != ''){
            $data = Answer::find($req->answer_id);
        }else{
            $data = new Answer();
        }
        
        $data->answer_code = $req->answer_code;
        $data->answer_body = $req->answer_body;
        $data->answer_description = $req->answer_description;
        $data->answer_status = $req->answer_status;
        $data->answer_image = $req->answer_image;
        $data->question_id = $req->question_id;
        if($req->answer_condition == 'on'){
            $data->answer_condition = 1;
        }else{
            $data->answer_condition = 0;
        }
        $data->save();
        $sdata = Answer::with('questionaire')->find($data->answer_id);
        return response()->json($sdata);
    }

    function delete_answer($sid){
        $data = Answer::find($sid);
        $data->delete();
        return response()->json($data);
    }
}
