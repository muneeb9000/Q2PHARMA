<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = [

        'company_id',
        'customer_id',
        'invoice_no',
        'sale_date',
        'payment_date',
        'payee_name',
        'total_amount',
        'total_discount',
        'sale_status',
        'payment_status',
        'users_id',
        'remarks',
    ];
    public function company()
    {
        return $this->belongsTo(companies::class,'company_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
    }
    public function customers()
    {   
        return $this->belongsTo(Customers::class,'customer_id');
    }
    public function products()
    {
        return $this->belongsTo(Products::class,'product_id');
    }
    public function details()
    {
        return $this->hasMany(SalesDetails::class, 'sales_id');
    }
    public function salesDetails()
    {
        return $this->hasMany(SalesDetails::class, 'sales_id'); 
    }
}
