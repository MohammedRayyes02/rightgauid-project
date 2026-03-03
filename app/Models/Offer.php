<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'title',
        'old_price',
        'new_price',
        'offer_img',
        'persantage_offer',
        'hospital_id',
        'doctor_id'
    ];

    public function hospital(){
        return $this->belongsTo(Hospital::class); 
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

    
    
    
    }
