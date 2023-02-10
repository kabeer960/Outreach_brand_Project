<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductStoreRequest;

class ProductController extends Controller
{
    function show_products(){
        $data  = Product::all();
        $cdata = Category::all();
        $sdata = Subcategory::all();
        return view('products.product.products', ['items' => $data, 'members' => $cdata, 'submembers' => $sdata]);
    }

    function change_cate($get_id){
        $sdata = Subcategory::where('category_id', $get_id)->get();
        
        return response()->json($sdata);
        
    }

    function edit_product($pro_id){
        $data = Product::with('category', 'subcategory')->find($pro_id);
        return response()->json($data);

    }

    function store(ProductStoreRequest $req){
        if($req->product_id !=''){
            $data = Product::find($req->product_id);
        }else{
            $data = new Product();
        }
        $data->product_code = $req->product_code;
        $data->product_name = $req->product_name;
        $data->product_description = $req->product_description;
        $data->category_id = $req->category_id;
        $data->subcategory_id = $req->subcategory_id;
        $data->product_status = $req->product_status;
        $data->product_brand = $req->product_brand;
        $data->product_type = $req->product_type;
        $data->product_group = $req->product_group;
        $data->save();
        $sdata = Product::with('category', 'subcategory')->find($data->product_id);
        return response()->json($sdata);
    }

    function delete_product($pro_id){
        $data = Product::find($pro_id);
        $data->delete();
        return response()->json($data);
    }
}
