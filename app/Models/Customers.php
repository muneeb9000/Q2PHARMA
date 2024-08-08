<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $fillable = [

        'company_id','city_id','area_id','sub_areas_id','customer_type','business_name','contact_person_name','customer_cnic','contact_no','address','customer_email', 'password','license_no','license_expiry_date','license_category','tax_filer','filer_type','sales_tax_no','ntn_no'

    ];

    public function company() {

        return $this->belongsTo(Companies::class, 'company_id');

    }

    public function city() {

        return $this->belongsTo(Cities::class, 'city_id');

    }
    
    public function area() {

        return $this->belongsTo(Areas::class, 'area_id');

    }
    public function sub_area() {

        return $this->belongsTo(SubArea::class, 'sub_areas_id');

    }
}
