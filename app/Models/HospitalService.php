<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HospitalService extends Model
{
    protected $fillable = [
        'title',
        'service_img',
        'hospital_id'
    ];
}
