<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    use HasFactory;

    protected $fillable = ['company_id','trans_type','reference','amount','trans_date','pay_via','description'];

    public function company()
    {
        return $this->belongsTo(companies::class,'company_id');
    }

}
