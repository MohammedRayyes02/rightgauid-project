<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'name',
        'doctor_img',
        'description',
        'hospital_id',
        'department_id'
    ];

 public function hospital(){
    return $this->belongsTo(Hospital::class);
 }

 
 public function department(){
    return $this->belongsTo(Department::class);
 }

 
public function offers(){
   return $this->hasMany(Offer::class);
}

 }
