<?php

namespace App\Models;

use App\Http\Controllers\User\ProfileController;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    protected $fillable = [
        'followerId',
        'followingId',
    ];

    protected $appends = ['follower_profile', 'following_profile'];

    protected function followerProfile(): Attribute
    {
        return new Attribute(
            get: fn () => ProfileController::getProfile($this->followerId),
        );
    }

    protected function followingProfile(): Attribute
    {
        return new Attribute(
            get: fn () => ProfileController::getProfile($this->followingId),
        );
    }
}
