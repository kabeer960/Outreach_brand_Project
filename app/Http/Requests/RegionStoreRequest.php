<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegionStoreRequest extends FormRequest
{
    
    public function rules()
    {
        return [
            'region_code' => ['required', 'string', 'max:255'],
            'region_name' => ['required', 'string', 'max:255'],
            'region_description' => ['required', 'string'],
            'region_status' => ['required'],
            'zone_id' => ['required']
        ];
    }
}
