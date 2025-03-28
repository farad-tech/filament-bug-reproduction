<?php

namespace App\Models;

use App\Http\Controllers\DetailController;
use App\Http\Controllers\User\BlockingController;
use App\Http\Controllers\User\ChatController;
use App\Http\Controllers\User\FollowController;
use App\Http\Controllers\User\UserController;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_base_url',
        'image',
        'name',
        'bio',
        'gender',
        'birth_date',
        'user_id',
        'last_activity',
        'is_online',
    ];

    protected $casts = [
        'last_activity' => 'datetime',
        'birth_date', 'datetime',
    ];

    protected $appends = [
        'is_followed',
        'invited_counts',
        'is_private',
        'username',
        'am_i_blocked',
        'blocked_by_me',
    ];

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ($value == null) ? User::find($this->user_id)->username ?? '' : $value
        );
    }

    protected function imageBaseUrl(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if ($value == null) {
                    return (new DetailController())->app_url;
                } else {
                    return $value;
                }
            }
        );
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if ($value == null) {
                    return '/default-profile-image.jpg';
                } else {
                    return $value;
                }
            }
        );
    }


    public function isFollowed(): Attribute
    {
        return new Attribute(
            get: fn() => FollowController::checkUserFollowed(auth()->id(), $this->user_id),
        );
    }


    public function invitedCounts(): Attribute
    {
        return new Attribute(
            fn() => Invitation::where('invitor_id', auth()->id())->count(),
        );
    }

    public function isPrivate(): Attribute
    {
        return new Attribute(
            fn() => UserController::isPrivate($this->user_id)
        );
    }

    public function username(): Attribute
    {
        return new Attribute(
            fn() => UserController::getUsername($this->user_id)
        );
    }

    public function amIBlocked(): Attribute
    {
        return new Attribute(
            fn() => (new BlockingController())->amIBlocked($this->user_id)
        );
    }

    public function blockedByMe(): Attribute
    {
        return new Attribute(
            fn () => (new BlockingController())->blockedByMe($this->user_id)
        );
    }
}
