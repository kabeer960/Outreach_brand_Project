<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_role;
use App\Http\Requests\UserroleStoreRequest;

class UserroleController extends Controller
{
    function show_user_roles(){
        $data = User_role::all();
        return view('users.user_roles', ['items' => $data]);
    }

    function edit_user_role($role_id){
        $data = User_role::find($role_id);
        return response()->json($data);
    }

    function store(UserroleStoreRequest $req){
        if($req->user_role_id != ''){
            $data = User_role::find($req->user_role_id);
        }else{
            $data = new User_role();
        }
        $data->user_role_code = $req->user_role_code;
        $data->user_role_name = $req->user_role_name;
        $data->user_role_description = $req->user_role_description;
        $data->user_role_status = $req->user_role_status;
        $data->save();
        return response()->json($data);
    }

    function user_role_delete($user_role_id){
        $data = User_role::find($user_role_id);
        $data->delete();
        return response()->json($data);
    }
}
