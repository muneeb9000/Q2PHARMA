<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasesDetails extends Model
{
    use HasFactory;

    protected $fillable = ['purchases_id','products_id','product_price','quantity','discounts'];

   public function purchase()
   {
    return $this->belongsTo(Purchases::class,'purchases_id');
   }
   
   public function product()
   {
    return $this->belongsTo(Products::class,'products_id');
   }
    

}   

