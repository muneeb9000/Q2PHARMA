<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouses extends Model
{
    use HasFactory;

    protected $fillable = ['company_id','name','code','mobile_no','address','description'];

    public function companies()
    {
        return $this->belongsTo(Companies::class,'company_id');
    }
}
