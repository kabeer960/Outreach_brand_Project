<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompaignStoreRequest extends FormRequest
{
   
    public function rules()
    {
        return [
            'compaign_code' => ['required', 'string', 'max:255'],
            'compaign_name' => ['required', 'string', 'max:255'],
            'compaign_description' => ['required', 'string'],
            'compaign_start_date' => ['required'],
            'compaign_end_date' => ['required'],
            'compaign_status' => ['required'],
        ];
    }
}
