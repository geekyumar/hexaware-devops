<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationStatus extends Model
{
    use HasFactory;
    protected $table = 'application_status_history';
    protected $fillable = [
        'application_id',
        'job_id',
        'application_status',
        'notes'
    ];
}