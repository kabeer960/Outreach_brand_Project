<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Town;
use App\Models\Area;
use App\Http\Requests\TownStoreRequest;

class TownsController extends Controller
{
    function show_towns(){
        $data = Town::all();
        $cdata = Area::all();
        return view('masterdata.towns.towns', ['items' => $data, 'members' =>$cdata]);
    }

    function edit_town($to_id){
        $data = Town::with('area')->find($to_id);
        return response()->json($data);
    }

    function store(TownStoreRequest $req){
        if($req->town_id !=''){
            $data =  Town::find($req->town_id);

        }else{
            $data = new Town();
        }
        $data->town_code = $req->town_code;
        $data->town_name = $req->town_name;
        $data->town_description = $req->town_description;
        $data->area_id  = $req->area_id;
        $data->town_status = $req->town_status;
        $data->save();
        $cdata = Town::with('area')->find($data->town_id);
        return response()->json($cdata);
    }

    function delete_town($to_id){
        $data = Town::find($to_id);
        $data->delete();
        return response()->json($data);
    }
}
