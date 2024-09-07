<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
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
            'trans_type' => 'required|in:INCOME,EXPENSE',
            'reference' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'trans_date' => 'required|date',
            'pay_via' => 'required|in:BANK,CASH,ONLINE,CHEQUE',
            'description' => 'nullable|string|max:500',

        ];
    }
}
