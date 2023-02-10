<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shopsubcategory;
use App\Models\Shopcategory;

class ShopsubcategoryController extends Controller
{
    function show_shop_subcategories(){
        $data = Shopsubcategory::all();
        $cdata = Shopcategory::all();
        return view('market.shop_subcategories.shop_subcategories', ['items' => $data, 'members' => $cdata]);
    }

    function edit_shop_subcategory($cat_id){
        $data = Shopsubcategory::with('shopcategory')->find($cat_id);
        return response()->json($data);
    }

    function store(Request $req){
        if($req->shop_subcategory_id != ''){
            $data = Shopsubcategory::find($req->shop_subcategory_id);
        }else{
            $data = new Shopsubcategory();
            
        }
        $data->shop_subcategory_code = $req->shop_subcategory_code;
        $data->shop_subcategory_name = $req->shop_subcategory_name;
        $data->shop_subcategory_description = $req->shop_subcategory_description;
        $data->shop_subcategory_status = $req->shop_subcategory_status;
        $data->shop_category_id = $req->shop_category_id;
        $data->save();
        $sdata = Shopsubcategory::with('shopcategory')->find($data->shop_subcategory_id);
        return response()->json($sdata);
    }

    function delete_shop_subcategory($cat_id){
        $data = Shopsubcategory::find($cat_id);
        $data->delete();
        return response()->json($data);
    }
}
