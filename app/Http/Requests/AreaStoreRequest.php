<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AreaStoreRequest extends FormRequest
{
    
    public function rules()
    {
        return [
            'area_code' => ['required', 'string', 'max:255'],
            'area_name' => ['required', 'string', 'max:255'],
            'area_description' => ['required', 'string'],
            'area_status' => ['required'],
            'region_id' => ['required']
        ];
    }
}
