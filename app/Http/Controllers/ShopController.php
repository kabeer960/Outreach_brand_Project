<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Channel;
use App\Models\Shopclass;
use App\Models\Shopcategory;
use App\Models\Shopsubcategory;
use App\Http\Requests\ShopStoreRequest;

class ShopController extends Controller
{
    function show_shops(){
        $data = Shop::all();
        return view('market.shops.shops', ['items' => $data]);
    }

    function add_shop(){
        $data= Channel::all();
        $scdata = Shopclass::all();
        $scatedata = Shopcategory::all();
        $subcedata = Shopsubcategory::all();

        if(request('id')){
            $shop = Shop::find(request('id'));

        }else{
            $shop = new Shop();
        }

        return view('market.shops.add_shop', ['shop'=>$shop,'channel_items' => $data, 'class_items' => $scdata, 'cate_items' => $scatedata, 'subcate_items' => $subcedata]);
    }


    function edit_shop($sh_id){
        $data = Shop::find($sh_id);
        return response()->json($data);
    }

    function store_shop(ShopStoreRequest $req){
        if($req->shop_id !=''){
        $data = Shop::find($req->shop_id); 
        }   
        else{
            $data = new Shop();
        }
        $data->shop_code = $req->shop_code;
        $data->shop_name = $req->shop_name;
        $data->channel_id = $req->channel_id;
        $data->class_id = $req->class_id;
        $data->shop_category_id = $req->shop_category_id;
        $data->shop_subcategory_id = $req->shop_subcategory_id;
        $data->shop_address = $req->shop_address;
        $data->shop_description = $req->shop_description;
        $data->shop_status = $req->shop_status;
        $data->shop_owner_name = $req->shop_owner_name;
        $data->shop_owner_phone = $req->shop_owner_phone;
        $data->shop_owner_status = $req->shop_owner_status;
        $data->save();
        return redirect('shops');
    }

    function change_category_shop($id){
        $data = Shopsubcategory::where('shop_category_id', $id)->get();
        return response()->json($data);
    }

}
