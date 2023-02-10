<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopStoreRequest extends FormRequest
{
   
    public function rules()
    {
        return [
            'shop_code' => ['required', 'string', 'max:255'],
            'shop_name' => ['required', 'string', 'max:255'],
            'shop_description' => ['required', 'string'],
            'shop_status' => ['required'],
            'shop_owner_name' => ['required'],
            'shop_owner_phone' => ['required'],
            'shop_owner_status' => ['required'],
            'channel_id' => ['required'],
            'class_id' => ['required'],
            'shop_category_id' => ['required'],
            'shop_subcategory_id' => ['required'],
        ];
    }
}
