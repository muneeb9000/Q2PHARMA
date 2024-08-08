<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'company_name' => 'required',
            'company_type' => 'nullable',
            'company_email' => 'required|email',
            'company_number' => 'required',
            'company_city' => 'required',
            'company_state' => 'nullable',
            'company_address' => 'required',
            'license_no' => 'required',
            'ntn_no' => 'required',  
            'gst_no' => 'required', 
            'license_issue_date' => 'required',
            'license_expiry_date' => 'required',
            'ceo_name' => 'required',
            'ceo_number' => 'required',
            'ceo_email' => 'required|email',  
            'ceo_city' => 'required',
            'ceo_address' => 'required',
            'ceo_id_card' => 'required',
        ];
    }
}
