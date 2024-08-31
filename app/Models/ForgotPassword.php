<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForgotPassword extends Model
{
    use HasFactory;

    protected $table = 'forgot_password';
    protected $fillable = [
        'id',
        'user_id',
        'email',
        'reset_id',
        'is_clicked',
        'is_used',
        'created_at',
        'updated_at'
    ];
}
