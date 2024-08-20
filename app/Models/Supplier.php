<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = ['company_id','sup_company','name','email','phone','address'];


    public function company()
    {
        return $this->belongsTo(Companies::class, 'company_id');
    }
}
