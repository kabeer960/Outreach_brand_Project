<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;

class CitiesController extends Controller
{
    function show_cities(){
        $data = City::all();
        $cdata = Country::all();
        return view('masterdata.cities.cities', ['items' => $data, 'members' => $cdata]);
      
    }

    function edit_city($req_id){
        $data = City::with('country')->find($req_id);
        return response()->json($data);

    }

    function store(Request $req){
        if($req->city_id !=''){
            $data = City::find($req->city_id);
        }else{
            $data = new City();
        }
        $data->city_code = $req->city_code;
        $data->city_name = $req->city_name;
        $data->city_description = $req->city_description;
        $data->country_id  = $req->country_id;
        $data->city_status = $req->city_status;
        $data->save();
        $cdata = City::with('country')->find($data->city_id);
        return response()->json($cdata);
    }   
    
    function delete_city($req_id){
        $data = City::find($req_id);
        $data->delete();
        return response()->json($data);
    }
}
