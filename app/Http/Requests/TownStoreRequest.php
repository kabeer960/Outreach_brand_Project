<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TownStoreRequest extends FormRequest
{
   
    public function rules()
    {
        return [
            'town_code' => ['required', 'string', 'max:255'],
            'town_name' => ['required', 'string', 'max:255'],
            'town_description' => ['required', 'string'],
            'town_status' => ['required'],
            'area_id' => ['required']
        ];
    }
}
