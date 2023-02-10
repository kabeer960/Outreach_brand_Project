<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Requests\ClientStoreRequest;

class ClientController extends Controller
{
    function show_clients(){
        $data = Client::all();
        return view('masterdata.clients.clients', ['items' => $data]);
    }

    function edit_client($cli_id){
        $data = Client::find($cli_id);
        return response()->json($data);
    }
    
    function store_client(ClientStoreRequest $req){
        if($req->client_id != ''){
            $data = Client::find($req->client_id);
        }
        else{
            $data = new Client();
        }
        $data->client_id = $req->client_id;
        $data->client_code = $req->client_code;
        $data->client_name = $req->client_name;
        $data->client_description = $req->client_description;
        $data->client_status = $req->client_status;
        $data->save();
        return response()->json($data);
    }


    function delete_client($cli_id){
        $data = Client::find($cli_id);
        $data->delete();
        return response()->json($data);
        }
}
