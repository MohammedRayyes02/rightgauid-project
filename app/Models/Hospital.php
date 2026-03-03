<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enum\CityNameStatus;

class Hospital extends Model
{
    
   
    
    protected $fillable = [
        'name',
        'city',
        'year_of_establishment',
        'num_of_beds',
        'description',
        'hospital_img',
        'hospital_video',
        'facilities'
    ];



    public function departments(){
        return $this->hasMany(Department::class);
    } 

    
    public function doctors(){
        return $this->hasMany(Doctor::class);
    }

    public function priceQuotes(){
        return $this->hasMany(PriceQuote::class);
    }

    public function offers(){
        return $this->hasMany(Offer::class);
    }    

   
   public function patients(){
     return $this->hasMany(Patient::class);
   }
   
   
    protected $casts = [
    'facilities' => 'array',
    'city' => CityNameStatus::class
];



}
