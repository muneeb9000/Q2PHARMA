<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubArea extends Model
{
    use HasFactory;

    protected $fillable = ['sub_area_name','city_id','area_id','company_id'];

    public function company() {

        return $this->belongsTo(Companies::class, 'company_id');

    }

    public function city() {

        return $this->belongsTo(Cities::class, 'city_id');

    }
    
    public function Area() {

        return $this->belongsTo(Areas::class, 'area_id');

    }
}
