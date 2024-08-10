<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'company_id',
        'category_id',
        'code',
        'barcode',
        'sku',
        'batch_number',
        'reorder_level',
        'strength',
        'purchase_unit_id',
        'sale_unit_id',
        'unit_ratio',
        'status',
        'purchase_price',
        'sale_price',
        'tax',
        'description',
        'availability',
    ];

    public function companies()
    {
        return $this->belongsTo(companies::class, 'company_id');
    }

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function purchaseUnit()
    {
        return $this->belongsTo(Units::class, 'purchase_unit_id');
    }

    public function saleUnit()
    {
        return $this->belongsTo(Units::class, 'sale_unit_id');
    }


    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'purchase_price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'tax' => 'decimal:2',
    ];
}
