<?php

namespace App\Models;

use App\Http\Controllers\User\PostsController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Number;

class GroupMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        "group_id",
        "sender_id",
        "message",
        "file_path",
        "blur_hash",
        "voice_path",
        "sticker_id",
        "post",
        "reply_to",
    ];

    protected function Post(): Attribute
    {
        return new Attribute(
            get: fn($value) => ($value !== null) ? PostsController::getPost($value) : null
        );
    }

    protected $appends = ["is_me", "sender_profile", "file_size", "voice_size", "file_size"];

    protected function isMe(): Attribute
    {
        return new Attribute(
            fn() => $this->sender_id == auth()->id()
        );
    }

    protected function senderProfile(): Attribute
    {
        return new Attribute(
            get: fn() => ProfileController::getProfile($this->sender_id),
        );
    }

    protected function voiceSize(): Attribute
    {

        $voice = str_replace(Config::get('filesystems.ftp_domain') . '/chats', '', $this->voice_path);

        return new Attribute(
            get: fn() => (is_null($this->voice_path)) ? null : Number::fileSize(Storage::disk('chat_files_ftp')->size("/$voice"), 2)
        );
    }

    protected function fileSize(): Attribute
    {


        return new Attribute(
            fn () => 0
        );
    }
}
