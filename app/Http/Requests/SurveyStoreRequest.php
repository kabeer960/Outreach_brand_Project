<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SurveyStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'survey_code' => ['required', 'string', 'max:255'],
            'survey_name' => ['required', 'string', 'max:255'],
            'survey_description' => ['required', 'string'],
            'survey_status' => ['required'],
            'compaign_id' => ['required'],
        ];
    }
}
