<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCitiesRequest extends FormRequest
{
    public function authorize()
    {
        // Return true if the user is authorized to make this request
        return true;
    }

    public function rules()
    {
        return [
            'city_name' => 'required',
            'company_id' => 'required|exists:companies,id',
        ];
    }
}
