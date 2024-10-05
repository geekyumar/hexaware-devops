<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = [
        'name',
        'about',
        'skills',
        'educational_details'
    ];
}
