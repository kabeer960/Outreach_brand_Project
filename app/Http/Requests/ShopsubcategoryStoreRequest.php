<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopsubcategoryStoreRequest extends FormRequest
{
   
    public function rules()
    {
        return [
            'shop_subcategory_code' => ['required', 'string', 'max:255'],
            'shop_subcategory_name' => ['required', 'string', 'max:255'],
            'shop_subcategory_description' => ['required', 'string'],
            'shop_subcategory_status' => ['required'],
            'shop_category_id' => ['required'],
        ];
    }
}
