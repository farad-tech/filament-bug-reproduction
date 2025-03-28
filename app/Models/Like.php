<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'likable_id',
        'likable_type',
    ];

    public function likable(): MorphTo
    {
        return $this->morphTo();
    }

    protected function userId(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Profile::where('user_id', $value)->first()->only('user_id', 'image_base_url', 'image', 'name', 'bio')
        );
    }
}
