<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ZoneStoreRequest extends FormRequest
{
   
    public function rules()
    {
        return [
            'zone_code' => ['required', 'string', 'max:255'],
            'zone_name' => ['required', 'string', 'max:255'],
            'zone_description' => ['required', 'string'],
            'zone_status' => ['required'],
            'city_id' => ['required']
        ];
    }
}
