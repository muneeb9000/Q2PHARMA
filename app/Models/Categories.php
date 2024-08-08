<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $fillable =['company_id','name'];

    public function company()
    {
        return $this->belongsTo(Companies::class, 'company_id');
    }
}
