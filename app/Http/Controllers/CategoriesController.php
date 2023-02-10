<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Product_CategoryStoreRequest;

class CategoriesController extends Controller
{
    function show_categories(){
        $data = Category::all();
        return view('products.product_categories.categories', ['items' => $data]);
    }

    function edit_category($cat_id){
        $data = Category::find($cat_id);
        return response()->json($data);
    }

    function store(Product_CategoryStoreRequest $req){
        if($req->category_id !=''){
            $data = Category::find($req->category_id);
        }else{
            $data = new Category();
        }
        $data->category_code = $req->category_code;
        $data->category_name = $req->category_name;
        $data->category_description = $req->category_description;
        $data->category_status = $req->category_status;
        $data->save();
        return response()->json($data); 
    }

    function delete_category($cat_id){
        $data = Category::find($cat_id);
        $data->delete();
        return response()->json($data);
    }
}
