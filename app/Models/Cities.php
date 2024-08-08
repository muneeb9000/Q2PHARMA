<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;
    
    protected $fillable = ['city_name', 'company_id'];
    
    public function company()
    {
        return $this->belongsTo(Companies::class);
    }
}
