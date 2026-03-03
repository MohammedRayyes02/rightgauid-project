<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = [
        'rate_from_five',
        'comment',
        'date_of_comment',
        'user_id'
    ];
}
