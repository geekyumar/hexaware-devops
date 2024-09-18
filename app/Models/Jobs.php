<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    protected $table = 'jobs_list';

    protected $fillable = [
        'id',
        'job_title',
        'job_description',
        'department',
        'job_location',
        'employment_type',
        'salary_range',
        'application_deadline',
        'required_qualifications',
        'preferred_qualifications',
        'responsibilities',
        'is_published'
    ];
}
