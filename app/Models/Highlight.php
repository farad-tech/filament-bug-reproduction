<?php

namespace App\Models;

use App\Http\Controllers\User\ProfileController;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Highlight extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'cover',
        'base_url',
        'user_id',
    ];

    public function userId(): Attribute
    {
        return new Attribute(
            function ($value) {
                return ProfileController::getProfile($value);
            }
        );
    }
}
