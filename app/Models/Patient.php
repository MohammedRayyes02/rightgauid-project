<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'full_name',
        'phone_num',
        'country',
        'patient_img',
        'user_id',
        'hospital_id',
        'department_id'
    ];



    public function user(){
        return $this->belongsTo(User::class);
    }

    public function hospital(){
        return $this->belongsTo(Hospital::class);
    }
    
    
    public function department(){
        return $this->belongsTo(Department::class);
    }
    
    
    
    public function priceQuotes(){
        return $this->hasMany(PriceQuote::class);
    }
    
    }
