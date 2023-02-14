<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopcategoryStoreRequest extends FormRequest
{
    
    public function rules()
    {
        return [
            'shop_category_code' => ['required', 'string', 'max:255'],
            'shop_category_name' => ['required', 'string', 'max:255'],
            'shop_category_description' => ['required', 'string'],
            'shop_category_status' => ['required'],
        ];
    }
}
