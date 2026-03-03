<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'date',
        'blog_img',
        'description',
        'tags',
        'department_id',
        'hospital_id'
        ];

   protected $casts = [
    'tags'=>'array',
    'date'=>'datetime'
    ];
   
    public function department(){
        return $this->belongsTo(Department::class);
    }

 
 
    }
