<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyStoreRequest extends FormRequest
{
    
    public function rules()
    {
        return [
            'company_code' => ['required', 'string', 'max:255'],
            'company_name' => ['required', 'string', 'max:255'],
            'company_description' => ['required', 'string'],
            'company_status' => ['required'],
        ];
    }
}
