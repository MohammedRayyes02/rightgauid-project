<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FreeConsultation extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'phone_num',
        'department',
        'case',
        'description'

    ];
}
