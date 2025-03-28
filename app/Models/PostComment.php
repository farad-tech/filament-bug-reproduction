<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class PostComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'replyTo',
        'user_id',
        'post_id',
    ];

    // protected function userId(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn($value) => Profile::where('user_id', $value)->first()->only('image_base_url', 'image', 'name', 'bio')
    //     );
    // }

    protected static function booted()
    {
        static::deleted(function ($comment) {

            Like::where('likable_id', $comment->id)->where('likable_type', Like::class)->delete();

        });
    }

    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class, 'likable');
    }
}
