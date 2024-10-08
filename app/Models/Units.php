<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Units extends Model
{
    use HasFactory;

    protected $fillable = ['company_id','name'];

    public function company()
    {
        return $this->belongsTo(Companies::class);
    }
    public function products()
    {
        return $this->hasMany(Products::class, 'unit_id');
    }

}
