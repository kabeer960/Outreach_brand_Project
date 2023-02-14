<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityStoreRequest extends FormRequest
{
   
    public function rules()
    {
        return [
            'city_code' => ['required', 'string', 'max:255'],
            'city_name' => ['required', 'string', 'max:255'],
            'city_description' => ['required', 'string'],
            'city_status' => ['required'],
            'country_id' => ['required']
        ];
    }
}
