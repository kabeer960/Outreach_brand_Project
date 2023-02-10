<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;
use App\Models\Town;

class RoutesController extends Controller
{
    function show_routes(){
        $data = Route::all();
        $cdata = Town::all();
        return view('masterdata.routes.routes', ['items' => $data, 'members' =>$cdata]);
    }

    function edit_route($ro_id){
        $data = Route::with('town')->find($ro_id);
        return response()->json($data);
    }

    function store(Request $req){
        if($req->route_id !=''){
            $data =  Route::find($req->route_id);

        }else{
            $data = new Route();
        }
        $data->route_code = $req->route_code;
        $data->route_name = $req->route_name;
        $data->route_description = $req->route_description;
        $data->town_id  = $req->town_id;
        $data->route_status = $req->route_status;
        $data->save();
        $cdata = Route::with('Town')->find($data->route_id);
        return response()->json($cdata);
    }

    function delete_route($ro_id){
        $data = Route::find($ro_id);
        $data->delete();
        return response()->json($data);
    }
}
