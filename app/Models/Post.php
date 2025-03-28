<?php

namespace App\Models;

use App\Http\Controllers\User\BookmarkController;
use App\Http\Controllers\User\PostLinkController;
use App\Http\Controllers\User\WalletController;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'base_url',
        'file_name',
        'type',
        'caption',
        'view',
        'latitude',
        'longitude',
        'likes_count',
        'comments_count',
        'shares_count',
        'saves_count',
        'user_id',
    ];

    protected $appends = ['is_liked', 'author', 'is_bookmarked'];

    protected static function booted()
    {
        static::created(function ($post) {
            $user = User::find($post->user_id);

            $invitation = Invitation::where('invited_id', $user->id)->first();

            if ($invitation !== null) {

                $user_posts_count = Post::where('user_id', $user->id)->count();

                if ($user_posts_count == 3) {

                    $invitor_id = $invitation->invitor_id;

                    $flow = Setting::where('slug', 'INVITATION_INCOME_PER_INVITE')->first()->value ?? 0;

                    WalletController::addFlow($invitor_id, $flow);
                    
                }
            }

            // Create Post Link
            PostLinkController::generate($post->id);
        });

        static::deleted(function ($post) {

            PostThumbnail::where('post_id', $post->id)->delete();
            PostComment::where('post_id', $post->id)->delete();

        });
    }

    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class, 'likable');
    }

    public function thumbnail(): HasOne
    {
        return $this->hasOne(PostThumbnail::class);
    }

    public function isLiked(): Attribute
    {
        return new Attribute(
            get: fn () => ($this->likes()->where('user_id', auth()->id())->first() == null) ? false : true,
        );
    }

    public function author(): Attribute
    {
        $author = [
            'username' => User::where('id', $this->user_id)->first()->username ?? '',
            'profile' => Profile::where('user_id', $this->user_id)->select('image_base_url', 'image', 'name', 'bio')->first(),
        ];

        return new Attribute(
            get: fn () => $author,
        );
    }

    public function isBookmarked(): Attribute
    {
        $bookmark_post = BookmarkedPosts::where('post_id', $this->id)->where('user_id', auth()->id())->first();

        return new Attribute(
          fn () => $bookmark_post != null
        );
    }

    public function postLink(): HasOne
    {

        return $this->hasOne(PostLink::class);

    }
}
