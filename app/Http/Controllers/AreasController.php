<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Region;


class AreasController extends Controller
{
    function show_areas(){
        $data = Area::all();
        $cdata = Region::all();
        return view('masterdata.areas.areas', ['items' => $data, 'members' =>$cdata]);
    }

    function edit_area($ar_id){
        $data = Area::with('region')->find($ar_id);
        return response()->json($data);
    }

    function store(Request $req){
        if($req->area_id !=''){
            $data =  Area::find($req->area_id);

        }else{
            $data = new Area();
        }
        $data->area_code = $req->area_code;
        $data->area_name = $req->area_name;
        $data->area_description = $req->area_description;
        $data->region_id  = $req->region_id;
        $data->area_status = $req->area_status;
        $data->save();
        $cdata = Area::with('region')->find($data->area_id);
        return response()->json($cdata);
    }

    function delete_area($ar_id){
        $data = Area::find($ar_id);
        $data->delete();
        return response()->json($data);
    }
}
