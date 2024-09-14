<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
        return [
            'company_id' => 'required|exists:companies,id',
            'joining_date' => 'required|date',
            'designation_id' => 'required|exists:designations,id',
            'department_id' => 'required|exists:departments,id',
            'qualification' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'gender' => 'required|in:MALE,FEMALE',
            'religion' => 'required|string|max:255',
            'blood_group' => 'required|in:A+,A,A-,B+,B,B-,AB+,AB-,O+,O-',
            'dob' => 'required|date',
            'number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $this->route('employee'), 
            'password' => 'nullable|min:8|confirmed', 
        ];
    }
}
