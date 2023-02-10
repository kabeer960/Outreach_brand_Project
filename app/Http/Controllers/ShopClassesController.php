<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shopclass;
class ShopClassesController extends Controller
{
    function show_classes(){
        $data = Shopclass::all();
        return view('market.classes.classes', ['items' => $data]);
    }

    function class_edit($cla_id){
        $data = Shopclass::find($cla_id);
        return response()->json($data);
    }

    function store(Request $req){
        if($req->class_id != ''){
            $data = Shopclass::find($req->class_id);
        }else{
            $data = new Shopclass();

        }
        $data->class_code = $req->class_code;
        $data->class_name = $req->class_name;
        $data->class_description = $req->class_description;
        $data->class_status = $req->class_status;
        $data->save();
        return response()->json($data);
    }

    function class_delete($cla_id){
        $data = Shopclass::find($cla_id);
        $data->delete();
        return response()->json($data);
    }
}
