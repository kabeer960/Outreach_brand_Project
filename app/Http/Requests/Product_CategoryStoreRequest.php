<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class Product_CategoryStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'category_code' => ['required', 'string', 'max:255'],
            'category_name' => ['required', 'string', 'max:255'],
            'category_description' => ['required', 'string'],
            'category_status' => ['required'],
        ];
    }
}