<?php

namespace App\Models;

use App\Http\Controllers\User\PostsController;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookmarkedPosts extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'user_id',
    ];

    // protected function postId(): Attribute
    // {
    //     return new Attribute(
    //         get: fn($value) => PostsController::getPost($value) 
    //     );
    // }
}
