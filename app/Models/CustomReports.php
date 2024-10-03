<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomReports extends Model
{
    use HasFactory;
    protected $table = 'custom_reports';
    protected $fillable = [
        'report_name',
        'created_by',
        'report_pdf',
        'selected_fields'
    ];
    protected $casts = [
        'selected_fields' => 'array'
    ];
}
