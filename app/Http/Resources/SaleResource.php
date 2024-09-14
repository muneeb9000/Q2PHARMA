<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'invoice_no' => $this->invoice_no,
            'company' => $this->company->name,
            'customer' => $this->customer->name,
            'total_amount' => $this->total_amount,
            'total_discount' => $this->total_discount,
            'sale_date' => $this->sale_date,
            'remarks' => $this->remarks,
        ]; 
    }
}
