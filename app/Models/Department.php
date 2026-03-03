<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name',
        'department_img',
        'description',
        'hospital_id',
        'patient_id'

    ];

    public function hospital(){
        return $this->belongsTo(Hospital::class);
    }

    public function doctors(){
    return $this->hasMany(Doctor::class);
    }

    public function patients (){
     return $this->hasMany(Patient::class);
    }

   public function priceQuotes (){
    return $this->hasMany(PriceQuote::class);
    }

    public function Blogs(){
        return $this->hasMany(Blog::class);
    }

 }
