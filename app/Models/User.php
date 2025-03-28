<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Http\Controllers\User\BlockingController;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'phone_number',
        'phone_number_verify_code',
        'phone_number_verified_at',
        'email',
        'password',
        'suspension',
        'private'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_number_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    protected $appends = ['is_followed', 'is_blocked', 'blocked_by_me'];

    public function isFollowed(): Attribute
    {
        return new Attribute(
            get: fn() => (Follow::where('followerId', auth()->id())->where('followingId', auth()->id())->first() !== null) ? true : false,
        );
    }

    public function isBlocked(): Attribute
    {
        return new Attribute(
            get: fn() => (new BlockingController())->checkBlocked($this->user_id, auth()->id())
        );
    }

    public function blockedByMe(): Attribute
    {
        return new Attribute(
            get: fn() => (new BlockingController())->checkBlocked( auth()->id(), $this->user_id)
        ); 
    }

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    protected static function booted(): void
    {
        static::deleted(function (User $user) {

            $id = $user->id;

            DB::transaction(function () use ($id) {

                Blocked_user::where('blocker_id', $id)->orWhere('blocking_id', $id)->delete();
                $chats = Chat::where('chat_starter_user', $id)->orWhere('chat_reciever_user', $id)->get();

                foreach ($chats as $chat) {

                    Message::where('chat_id', $chat->id)->delete();

                    $chat->delete();
                }

                FirebaseDevicesRegistrationToken::where('user_id', $id)->delete();

                Follow::where('followerId', $id)->orWhere('followingId', $id)->delete();

                Invitation::where('invitor_id', $id)->orWhere('invited_id', $id)->delete();

                InvitationCode::where('user_id', $id)->delete();

                Like::where('user_id', $id)->delete();

                $posts = Post::where('user_id', $id)->get();

                foreach ($posts as $post) {
                    PostThumbnail::where('post_id', $post->id)->delete();

                    $post->delete();
                }

                PostComment::where('user_id', $id)->delete();

                Like::where('user_id', $id)->delete();

                Profile::where('user_id', $id)->delete();

                Report::where('reported_by', $id)->delete();

                Shaba_number::where('user_id', $id)->delete();

                Story::where('user_id', $id)->delete();

                StorySeen::where('user_id', $id)->delete();

                WalletFlow::where('user_id', $id)->delete();

                
            });
        });
    }
}
