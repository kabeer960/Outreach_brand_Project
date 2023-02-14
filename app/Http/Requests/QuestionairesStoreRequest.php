<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionairesStoreRequest extends FormRequest
{
   
    public function rules()
    {
        return [
            'question_code' => ['required', 'string', 'max:255'],
            'question_name' => ['required', 'string', 'max:255'],
            'question_description' => ['required', 'string'],
            'question_status' => ['required'],
        ];
    }
}
