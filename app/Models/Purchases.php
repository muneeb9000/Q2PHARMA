<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    use HasFactory;

    protected $fillable = ['company_id','supplier_id','warehouse_id','bill_no','total_amount','total_discount','purchase_status','payment_status','purchase_date','users_id','remarks'];

    public function company()
    {
        return $this->belongsTo(companies::class,'company_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'supplier_id');

    }
    public function warehouses()
    {
        return $this->belongsTo(Warehouses::class,'warehouse_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
    }
    public function products()
    {
        return $this->belongsTo(Products::class,'product_id');
    }
    public function details()
    {
        return $this->hasMany(PurchasesDetails::class, 'purchases_id');
    }



}


