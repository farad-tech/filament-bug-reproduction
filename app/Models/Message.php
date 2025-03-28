<?php

namespace App\Models;

use App\Http\Controllers\User\PostsController;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Number;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'chat_id',
        'sender_id',
        'message',
        'file_path',
        'blur_hash',
        'thumbnail',
        'voice_path',
        'sticker_id',
        'seen',
        'post',
        'reply_to'
    ];

    protected function Post(): Attribute
    {
        return new Attribute(
            get: fn ($value) => ($value !== null) ? PostsController::getPost($value)  : null
        );
    }


    protected function filePath(): Attribute
    {

        return new Attribute(
            fn ($value) => ($value !== null) ? Config::get('filesystems.ftp_domain') . $value : null
        );

    }

    public function voicePath(): Attribute
    {

        return new Attribute(
            fn ($value) => ($value !== null) ? Config::get('filesystems.ftp_domain') . $value : null
        );

    }
    
    protected $appends = ['get_profile', 'file_size', 'voice_size'];

    protected function getProfile(): Attribute
    {
        return new Attribute(
            get: fn () => (new Chat())->getProfile($this->sender_id),
        );
    }

    protected function fileSize(): Attribute
    {

        $file = str_replace(Config::get('filesystems.ftp_domain'). '/chats', '', $this->file_path);
        
        return new Attribute(
            get: fn () => (is_null($this->file_path)) ? null : Number::fileSize(Storage::disk('chat_files_ftp')->size("/$file"), 2)
        );
    }

    protected function voiceSize(): Attribute
    {

        $voice = str_replace(Config::get('filesystems.ftp_domain'). '/chats', '', $this->voice_path);
        
        return new Attribute(
            get: fn () => (is_null($this->voice_path)) ? null : Number::fileSize(Storage::disk('chat_files_ftp')->size("/$voice"), 2)
        );
    }

    protected static function booted(): void
    {
        static::created(function (Message $message) {

            Chat::where('id', $message->chat_id)->update([
                'updated_at' => Carbon::now()
            ]); 

        });
    }


}
