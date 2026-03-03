<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $fillable = [
        'title',
        'about_us_img',
        'about_us_video',
        'description',
        'key'
    ];
}
