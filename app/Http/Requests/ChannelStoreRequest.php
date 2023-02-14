<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChannelStoreRequest extends FormRequest
{
   
    public function rules()
    {
        return [
            'channel_code' => ['required', 'string', 'max:255'],
            'channel_name' => ['required', 'string', 'max:255'],
            'channel_description' => ['required', 'string'],
            'channel_status' => ['required'],
        
        ];
    }
}
