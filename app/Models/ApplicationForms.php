<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationForms extends Model
{
    use HasFactory;

    protected $table = 'application_forms';
    protected $fillable = [
        'id',
        'form_name',
        'associated_jobs',
        'additional_fields'
    ];

    protected $guarded = [];
}
