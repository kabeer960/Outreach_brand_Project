<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RouteStoreRequest extends FormRequest
{
    
    public function rules()
    {
        return [
            'route_code' => ['required', 'string', 'max:255'],
            'route_name' => ['required', 'string', 'max:255'],
            'route_description' => ['required', 'string'],
            'route_status' => ['required'],
            'town_id' => ['required']
        ];
    }
}
