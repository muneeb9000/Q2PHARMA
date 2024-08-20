<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;
use App\Models\Supplier;

class companies extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name', 'company_type', 'company_email', 'company_number', 
        'company_city', 'company_state', 'company_address', 'license_no', 
        'ntn_no', 'gst_no', 'license_issue_date', 'license_expiry_date', 
        'ceo_name', 'ceo_number', 'ceo_email', 'ceo_city', 'ceo_address', 
        'ceo_id_card'
    ];

    public function cities()
    {
        return $this->hasMany(Cities::class);
    }
    public function products()
    {
        return $this->hasMany(Products::class, 'company_id');
    }
    public function purchases()
    {
        return $this->hasMany(Purchases::class, 'company_id');
    }
    
}
