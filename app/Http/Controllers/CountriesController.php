<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountriesController extends Controller
{
    function show_countries(){
        $data = Country::all();
        return view('masterdata.countries.countries', ['items'=> $data]);
    }

    function edit_country($cou_id){
        $data = Country::find($cou_id);
        return response()->json($data);
    }

    function store_country(Request $req){
        if($req->country_id !=''){
            $data = Country::find($req->country_id);
        }else{
            $data = new Country();
        }
        $data->country_code = $req->country_code;
        $data->country_name = $req->country_name;
        $data->country_description = $req->country_description;
        $data->country_status = $req->country_status;
        $data->save();
        return response()->json($data);
    }

    function delete_country($coun_id){
        $data = Country::find($coun_id);
        $data->delete();
        return response()->json($data);
    }
}
