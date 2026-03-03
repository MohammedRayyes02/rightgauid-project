<?php

namespace App\Models;

use App\Enum\LastTest;
use App\Enum\OrderStatus;
use App\Enum\ServicesRequest;
use Illuminate\Database\Eloquent\Model;

class PriceQuote extends Model
{
    protected $fillable = [
        'title',
        'suggested_department_id',
        'order_status',
        'services_requested', 
        'last_test',
        'hospital_id',
        'patient_id'
    ];

    protected $casts = [
        'services_requested' => ServicesRequest::class,
        'last_test' => LastTest::class,
        'order_status' => OrderStatus::class
        ];

    public function hospital() { 
        return $this->belongsTo(Hospital::class);
    }


    public function patient(){
        return $this->belongsTo(Patient::class);
    }

  
    public function department(){
        return $this->belongsTo(Department::class,'suggested_department_id');
    }

   
    public function files() {
        return $this->hasMany(PriceQuoteFile::class);   
    }

    public function getFilesCountAttribute() {
        return $this->files->count();
    }





    }