<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryStoreRequest extends FormRequest
{
   
    public function rules()
    {
        return [
            'country_code' => ['required', 'string', 'max:255'],
            'country_name' => ['required', 'string', 'max:255'],
            'country_description' => ['required', 'string'],
            'country_status' => ['required'],
        ];
    }
}
