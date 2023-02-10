<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Product_SubcategoryStoreRequest extends FormRequest
{
   
    public function rules()
    {
        return [
            'subcategory_code' => ['required', 'string', 'max:255'],
            'subcategory_name' => ['required', 'string', 'max:255'],
            'subcategory_description' => ['required', 'string'],
            'subcategory_status' => ['required'],
            'category_id' => ['required'],
        ];
    }

}
