<?php

namespace App\Models;

use App\Http\Controllers\User\ProfileController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'chat_starter_user',
        'chat_reciever_user',
        'chat_reciever_user_approval',
    ];

    protected $appends = ['starter_profile', 'reciever_profile', 'other_profile'];

    protected function starterProfile(): Attribute
    {
        return new Attribute(
            get: fn () => ProfileController::getProfile($this->chat_starter_user),
        );
    }

    protected function recieverProfile(): Attribute
    {
        return new Attribute(
            get: fn () => ProfileController::getProfile($this->chat_reciever_user),
        );
    }

    protected function otherProfile(): Attribute
    {
        $id = (auth()->id() != $this->chat_reciever_user) ? $this->chat_reciever_user : $this->chat_starter_user;

        return new Attribute(
            get: fn () => ProfileController::getProfile($id),
        );
    }

    public function getProfile($user_id) {

        $profile = Profile::where('user_id', $user_id)->first();

        if($profile == null) {

            ProfileController::createNull($user_id);
            $profile = Profile::where('user_id', $user_id)->first();
        }

        return $profile;

    }
}
