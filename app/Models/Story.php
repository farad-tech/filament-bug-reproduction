<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Story extends Model
{
    use HasFactory;

    protected $fillable = [
        'base_url',
        'file_name',
        'user_id',
        'type',
    ];

    public function seens(): HasMany
    {
        return $this->hasMany(StorySeen::class);
    }

    public function userId(): Attribute
    {
        return new Attribute(
            get: function ($value) {
                return Profile::find($value);
            }
        );
    }
}
