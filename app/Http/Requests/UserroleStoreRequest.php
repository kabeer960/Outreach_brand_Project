<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserroleStoreRequest extends FormRequest
{
    
    public function rules()
    {
        return [
            'user_role_code' => ['required', 'string', 'max:255'],
            'user_role_name' => ['required', 'string', 'max:255'],
            'user_role_description' => ['required', 'string'],
            'user_role_status' => ['required'],
        ];
    }
}
