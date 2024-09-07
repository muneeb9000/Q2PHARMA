<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $id = $this->route('customer'); // Fetches the customer ID from the route
        return [
            'company_id' => 'required|integer|exists:companies,id',
            'city_id' => 'required|integer|exists:cities,id',
            'area_id' => 'required|integer|exists:areas,id',
            'sub_areas_id' => 'required|integer|exists:sub_areas,id',
            'customer_type' => 'required|string|max:255',
            'business_name' => 'required|string|max:255',
            'contact_person_name' => 'required|string|max:255',
            'customer_cnic' => 'required|string|max:15|unique:customers,customer_cnic,' . $id,
            'contact_no' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'customer_email' => 'required|string|email|max:255|unique:customers,customer_email,' . $id,
            'license_no' => 'nullable|string|max:255',
            'license_expiry_date' => 'nullable|date',
            'license_category' => 'nullable|string|max:255',
            'tax_filer' => 'required|string|max:255',
            'filer_type' => 'nullable|string|max:255',
            'sales_tax_no' => 'nullable|string|max:255',
            'ntn_no' => 'nullable|string|max:255',
        ];
    }
}
