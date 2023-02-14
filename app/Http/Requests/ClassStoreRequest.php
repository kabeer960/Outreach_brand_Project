<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'class_code' => ['required', 'string', 'max:255'],
            'class_name' => ['required', 'string', 'max:255'],
            'class_description' => ['required', 'string'],
            'class_status' => ['required'],
        ];
    }
}
