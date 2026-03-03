<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUS extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'phone_num',
        'message_reson',
        'description'
    ];
}
