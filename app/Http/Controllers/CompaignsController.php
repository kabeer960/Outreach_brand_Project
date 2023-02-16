<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compaign;
use App\Http\Requests\CompaignStoreRequest;

class CompaignsController extends Controller
{
    function show_compaigns(){
        $data = Compaign::all();
        return view('engagement.compaigns.compaigns', ['items' => $data]);
    }

    function edit_compaign($com_id){
        $data = Compaign::find($com_id);
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
        $data->save();
        return response()->json($data);
    }

    function delete_compaign($com_id){
        $data = Compaign::find($com_id);
        $data->delete();
        return response()->json($data);
    }
}
