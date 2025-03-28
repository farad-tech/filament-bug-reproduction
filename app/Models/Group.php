<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Config;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'bio',
        'base_url',
        'avatar',
        'name',
        'hash',
        'is_closed',
        'everyone_can_add',
        'owner_id',
        'users_silent',
    ];

    protected $appends = ['is_owner'];

    protected function isOwner(): Attribute
    {
        return new Attribute(
            fn () => $this->owner_id == auth()->id()
        );
    }

    public function messages(): HasMany
    {
        return $this->hasMany(GroupMessage::class)->orderByDesc('created_at');
    }
}
