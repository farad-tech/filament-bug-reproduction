<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'city',
        'shaba',
        'phone_number',
        'address',
        'admin_id'
    ];

    public function admin(): BelongsTo
    {

        return $this->belongsTo(Admin::class, 'admin_id');

    }
}
