<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormsAddField extends Model
{
    use HasFactory;
    protected $table = 'forms_add_fields';
    protected $fillable = [
        'id',
        'field_name',
        'field_type',
        'field_options'
    ];
}
