<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostThumbnail extends Model
{
    use HasFactory;

    protected $fillable = [
        'base_url',
        'file_name',
        'post_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
    
}
