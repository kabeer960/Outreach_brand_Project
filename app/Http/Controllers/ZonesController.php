<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zone;
use App\Models\City;

class ZonesController extends Controller
{
    function show_zones(){
        $data = Zone::all();
        $cdata = City::all();
        return view('masterdata.zones.zones', ['items' => $data, 'members' =>$cdata]);
        
    }

    function edit_zone($zo_id){
        $data = Zone::with('city')->find($zo_id);
        return response()->json($data);
    }

    function store(Request $req){
        if($req->zone_id !=''){
            $data =  Zone::find($req->zone_id);

        }else{
            $data = new Zone();
        }
        $data->zone_code = $req->zone_code;
        $data->zone_name = $req->zone_name;
        $data->zone_description = $req->zone_description;
        $data->zone_status = $req->zone_status;
        $data->city_id  = $req->city_id;
        $data->save();
        $cdata = Zone::with('city')->find($data->zone_id);
        return response()->json($cdata);
    }

    function delete_zone($zon_id){
        $data = Zone::find($zon_id);
        $data->delete();
        return response()->json($data);
    }
}
