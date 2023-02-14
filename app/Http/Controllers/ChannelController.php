<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channel;
use App\Http\Requests\ChannelStoreRequest;

class ChannelController extends Controller
{
    function show_channels(){
        $data = Channel::all();
        return view('market.channels.channels', ['items' => $data]);
    }

    function edit_channel($cha_id){
        $data = Channel::find($cha_id);
        return response()->json($data);
    }

    function store(ChannelStoreRequest $req){
        if($req->channel_id != ''){
            $data = Channel::find($req->channel_id);
        }else{
            $data = new Channel();

        }
        $data->channel_code = $req->channel_code;
        $data->channel_name = $req->channel_name;
        $data->channel_description = $req->channel_description;
        $data->channel_status = $req->channel_status;
        $data->save();
        return response()->json($data);
    }

    function delete_channel($cha_id){
        $data = Channel::find($cha_id);
        $data->delete();
        return response()->json($data);
    }
}
