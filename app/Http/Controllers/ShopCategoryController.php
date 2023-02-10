<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShopCategory;

class ShopCategoryController extends Controller
{
    function show_shop_categories(){
        $data = ShopCategory::all();
        return view('market.shop_categories.shop_categories', ['items' => $data]);
    }

    function edit_shop_category($cat_id){
        $data = ShopCategory::find($cat_id);
        return response()->json($data);
    }

    function store(Request $req){
        if($req->shop_category_id != ''){
            $data = ShopCategory::find($req->shop_category_id);
        }else{
            $data = new ShopCategory();

        }
        $data->shop_category_code = $req->shop_category_code;
        $data->shop_category_name = $req->shop_category_name;
        $data->shop_category_description = $req->shop_category_description;
        $data->shop_category_status = $req->shop_category_status;
        $data->save();
        return response()->json($data);
    }

    function delete_shop_category($cat_id){
        $data = ShopCategory::find($cat_id);
        $data->delete();
        return response()->json($data);
    }
}
