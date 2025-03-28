<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMS extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_provider',
        'username',
        'password',
        'fromnumber',
        'verify_code_pattern',
    ];
}
