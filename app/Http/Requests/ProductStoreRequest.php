<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'product_code' => ['required', 'string', 'max:255'],
            'product_name' => ['required', 'string', 'max:255'],
            'product_brand' => ['required', 'string', 'max:255'],
            'product_type' => ['required', 'string', 'max:255'],
            'product_group' => ['required', 'string', 'max:255'],
            'product_description' => ['required', 'string'],
            'category_id' => ['required', 'string'],
            'product_status' => ['required'],
        ];
    }
}