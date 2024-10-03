<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job_category extends Model
{
    protected $table = 'job_categories';
    protected $fillable = [
        'category_type',
        'category_name',
    ];

    
}
