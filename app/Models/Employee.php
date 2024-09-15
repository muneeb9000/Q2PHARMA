<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'joining_date',
        'user_id',
        'designation_id',
        'department_id',
        'quanlification',
        'experience',
        'name',
        'gender',
        'religion',
        'blood_group',
        'dob',
        'number',
        'address',
        'email',
        'password',
    ];

    public function company()
    {
        return $this->belongsTo(companies::class,'company_id');
    }
    public function designation()
    {
        return $this->belongsTo(Designations::class,'designation_id');
    }
    public function department()
    {
        return $this->belongsTo(Departments::class,'department_id');
    }
    
}
