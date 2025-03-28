<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StorySeen extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'story_id',
    ];

    public function story(): BelongsTo
    {
        return $this->belongsTo(Story::class);
    }

    protected function userId(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                $profile = Profile::find($value);
                $profile->username = User::find($value)->username;

                return $profile;
            }
        );
    }


}
