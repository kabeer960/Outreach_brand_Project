<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subcategory;
use App\Models\Category;
use App\Http\Requests\Product_SubcategoryStoreRequest;

class SubcategoriesController extends Controller
{
    function show_subcategories(){
        $data = Subcategory::all();
        $sdata = Category::all();
        return view('products.product_subcategories.subcategories', ['items' => $data, 'members' => $sdata]);
    }


    function edit_subcategory($sub_id){
        $data = Subcategory::with('category')->find($sub_id);
        return response()->json($data); 
    }

    function store(Product_SubcategoryStoreRequest $req){
        if($req->subcategory_id !=''){
            $data = Subcategory::find($req->subcategory_id);
        }else{
            $data = new Subcategory();
        }
        $data->subcategory_code = $req->subcategory_code;
        $data->subcategory_name = $req->subcategory_name;
        $data->subcategory_description = $req->subcategory_description;
        $data->category_id  = $req->category_id;
        $data->subcategory_status = $req->subcategory_status;
        $data->save();
        $sdata = Subcategory::with('category')->find($data->subcategory_id);
        return response()->json($sdata);

    }

    function delete_subcategories($sub_id){
        $data = Subcategory::find($sub_id);
        $data->delete();
        return response()->json($data);
    }
}
