<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplications extends Model
{
    use HasFactory;
    protected $table = 'job_applications';

    protected $fillable = [
        'id',
        'job_id',
        'applicant_name',
        'email',
        'phone',
        'resume',
        'application_status',
        'notes',
    ];
}
