<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesDetails extends Model
{
    use HasFactory;

    protected $fillable = ['sales_id','product_id','product_price','quantity','discounts'];

    public function sale()
   {
    return $this->belongsTo(Sales::class,'sales_id');
   }
   public function product()
   {
    return $this->belongsTo(Products::class,'product_id');
   }
   public function salesDetails()
   {
    return $this->hasMany(SalesDetails::class);
   }
}
