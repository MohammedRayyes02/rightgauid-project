<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requeste extends Model
{
    protected $fillable = [
        'request_num',    
        'date_of_send',
        'Order_status',
        'hospital_id',
        'department_id'
    ];
 
}
