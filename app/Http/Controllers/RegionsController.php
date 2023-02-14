<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Zone;
use App\Http\Requests\RegionStoreRequest;

class RegionsController extends Controller
{
    function show_regions(){
        $data = Region::all();
        $cdata = Zone::all();
        return view('masterdata.regions.regions', ['items' => $data, 'members' =>$cdata]);
    }

    function edit_region($re_id){
        $data = Region::with('zone')->find($re_id);
        return response()->json($data);
    }

    function store(RegionStoreRequest $req){
        if($req->region_id !=''){
            $data =  Region::find($req->region_id);

        }else{
            $data = new Region();
        }
        $data->region_code = $req->region_code;
        $data->region_name = $req->region_name;
        $data->region_description = $req->region_description;
        $data->zone_id  = $req->zone_id;
        $data->region_status = $req->region_status;
        $data->save();
        $cdata = Region::with('zone')->find($data->region_id);
        return response()->json($cdata);
    }

    function delete_region($re_id){
        $data = Region::find($re_id);
        $data->delete();
        return response()->json($data);
    }
}
