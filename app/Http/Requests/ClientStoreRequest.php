<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientStoreRequest extends FormRequest
{
    
    public function rules()
    {
        return [
            'client_code' => ['required', 'string', 'max:255'],
            'client_name' => ['required', 'string', 'max:255'],
            'client_description' => ['required', 'string'],
            'client_status' => ['required'],
        ];
    }
}
