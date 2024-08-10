<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // You can implement your authorization logic here. For now, it returns true.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $productId = $this->route('product');
        return [
            'name' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'category_id' => 'required|exists:categories,id',
            'code' => 'required|string|unique:products,code,' . $productId,
            'barcode' => 'nullable|string|unique:products,barcode,' . $productId,
            'sku' => 'required|string|unique:products,sku,' . $productId,
            'batch_number' => 'nullable|string',
            'reorder_level' => 'required|integer',
            'strength' => 'nullable|string',
            'purchase_unit_id' => 'required|exists:units,id',
            'sale_unit_id' => 'required|exists:units,id',
            'unit_ratio' => 'required|integer',
            'status' => 'required|in:active,inactive',
            'purchase_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'tax' => 'required|numeric',
            'description' => 'nullable|string',
            'availability' => 'required|in:in_stock,out_of_stock',
        ];
    }
}
