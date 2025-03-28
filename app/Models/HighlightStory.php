<?php

namespace App\Models;

use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\StoryController;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HighlightStory extends Model
{
    use HasFactory;

    protected $fillable = [
        'story_id',
        'highlight_id',
        'user_id',
    ];

    public function highlightId(): Attribute
    {
        return new Attribute(
            function ($value) {
                return Highlight::where('id', $value)->first();
            }
        );
    }

    public function userId(): Attribute
    {
        return new Attribute(
            function ($value) {
                return ProfileController::getProfile($value);
            }
        );
    }
    
}
