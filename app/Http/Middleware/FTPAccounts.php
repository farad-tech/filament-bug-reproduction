<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class FTPAccounts
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $setting = new Setting();


        $FTP_HOST = $setting->where('slug', 'FTP_HOST')->first()->value;
        $FTP_USER = $setting->where('slug', 'FTP_USER')->first()->value;
        $FTP_PASSWORD = $setting->where('slug', 'FTP_PASSWORD')->first()->value;
        $FTP_ROOT_POST_IMAGES = $setting->where('slug', 'FTP_ROOT_POST_IMAGES')->first()->value;
        $FTP_ROOT_POST_VIDEOS = $setting->where('slug', 'FTP_ROOT_POST_VIDEOS')->first()->value;
        $FTP_ROOT_POST_THUMBNAIL = $setting->where('slug', 'FTP_ROOT_POST_THUMBNAIL')->first()->value;
        $FTP_ROOT_PROFILE_IMAGES = $setting->where('slug', 'FTP_ROOT_PROFILE_IMAGES')->first()->value;
        $FTP_ROOT_CHAT_FILES = $setting->where('slug', 'FTP_ROOT_CHAT_FILES')->first()->value;
        $FTP_DOMAIN = $setting->where('slug', 'FTP_DOMAIN')->first()->value;

        Config::set('filesystems.disks.profile_photo_ftp.host', $FTP_HOST);
        Config::set('filesystems.disks.profile_photo_ftp.username', $FTP_USER);
        Config::set('filesystems.disks.profile_photo_ftp.password', $FTP_PASSWORD);
        Config::set('filesystems.disks.profile_photo_ftp.root', $FTP_ROOT_PROFILE_IMAGES);

        Config::set('filesystems.disks.posts_video_ftp.host', $FTP_HOST);
        Config::set('filesystems.disks.posts_video_ftp.username', $FTP_USER);
        Config::set('filesystems.disks.posts_video_ftp.password', $FTP_PASSWORD);
        Config::set('filesystems.disks.posts_video_ftp.root', $FTP_ROOT_POST_VIDEOS);

        Config::set('filesystems.disks.posts_image_ftp.host', $FTP_HOST);
        Config::set('filesystems.disks.posts_image_ftp.username', $FTP_USER);
        Config::set('filesystems.disks.posts_image_ftp.password', $FTP_PASSWORD);
        Config::set('filesystems.disks.posts_image_ftp.root', $FTP_ROOT_POST_IMAGES);

        Config::set('filesystems.disks.posts_thumbnail_ftp.host', $FTP_HOST);
        Config::set('filesystems.disks.posts_thumbnail_ftp.username', $FTP_USER);
        Config::set('filesystems.disks.posts_thumbnail_ftp.password', $FTP_PASSWORD);
        Config::set('filesystems.disks.posts_thumbnail_ftp.root', $FTP_ROOT_POST_THUMBNAIL);

        Config::set('filesystems.disks.chat_files_ftp.host', $FTP_HOST);
        Config::set('filesystems.disks.chat_files_ftp.username', $FTP_USER);
        Config::set('filesystems.disks.chat_files_ftp.password', $FTP_PASSWORD);
        Config::set('filesystems.disks.chat_files_ftp.root', $FTP_ROOT_CHAT_FILES);

        Config::set('filesystems.ftp_domain', $FTP_DOMAIN);

        // $ftp = Storage::createFtpDriver([
        //     'driver' => 'ftp',
        //     'host' => 'imn.tra.de',
        //     'username' => $setting->user_name,
        //     'password' => $setting->password,
        //     'port'     => 21,
        //     'ssl'      => true,
        // ]);
        
        // $ftp->put($file, $localFile);

        return $next($request);
    }
}
