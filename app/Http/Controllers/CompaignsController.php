<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compaign;
use App\Models\Survey;
use App\Http\Requests\CompaignStoreRequest;

class CompaignsController extends Controller
{
    function show_compaigns(){
        $data = Compaign::all();
        $sdata = Survey::all();
        return view('engagement.compaigns.compaigns', ['items' => $data, 'members' => $sdata]);
    }

    function edit_compaign($com_id){
        $data = Compaign::with('survey')->find($com_id);
        return response()->json($data);
    }

    function compaign_store(CompaignStoreRequest $req){
        if($req->compaign_id !=''){
            $data = Compaign::find($req->compaign_id);
        }else{
            $data = new Compaign();
        }
        $data->compaign_code = $req->compaign_code;
        $data->compaign_name = $req->compaign_name;
        $data->compaign_description = $req->compaign_description;
        $data->compaign_start_date = $req->compaign_start_date;
        $data->compaign_end_date = $req->compaign_end_date;
        $data->compaign_status = $req->compaign_status;
        $data->survey_id = $req->survey_id;
        $data->save();
        $rdata = Compaign::with('survey')->find($data->compaign_id);
        return response()->json($rdata);
    }

    function delete_compaign($com_id){
        $data = Compaign::find($com_id);
        $data->delete();
        return response()->json($data);
    }
}
