<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;

    protected $table = 'interviews';
    protected $fillable = [
        'applicant_id',
        'job_id',
        'interview_date',
        'interview_time',
        'interviewers',
        'interview_mode',
        'interview_location',
        'is_active',
    ];
}