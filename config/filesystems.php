<?php

use App\Http\Controllers\DetailController;

$app_url = (new DetailController())->app_url;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been set up for each driver as an example of the required values.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'ftp_domain' => null,

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => $app_url . '/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],

        'avatars' => [
            'driver' => 'local',
            'root' => storage_path('app/public/avatars'),
            'url' => $app_url . '/storage/avatars/',
            'visibility' => 'public',
            'throw' => false,
        ],

        'profile_photo_ftp' => [
            'driver'   => 'ftp',
            // 'host'     => env('FTP_HOST'),
            // 'username' => env('FTP_USER'),
            // 'password' => env('FTP_PASSWORD'),
            // 'root' => env('FTP_ROOT_PROFILE_IMAGES'),
        ],

        'posts_video_ftp' => [
            'driver'   => 'ftp',
            // 'host'     => env('FTP_HOST'),
            // 'username' => env('FTP_USER'),
            // 'password' => env('FTP_PASSWORD'),
            // 'root' => env('FTP_ROOT_POST_VIDEOS'),
        ],

        'posts_thumbnail_ftp' => [
            'driver'   => 'ftp',
            // 'host'     => env('FTP_HOST'),
            // 'username' => env('FTP_USER'),
            // 'password' => env('FTP_PASSWORD'),
            // 'root' => env('FTP_ROOT_POST_VIDEOS'),
        ],

        'posts_image_ftp' => [
            'driver'   => 'ftp',
            // 'host'     => env('FTP_HOST'),
            // 'username' => env('FTP_USER'),
            // 'password' => env('FTP_PASSWORD'),
            // 'root' => env('FTP_ROOT_POST_IMAGES'),
        ],

        'chat_files_ftp' => [
            'driver'   => 'ftp',
            // 'host'     => env('FTP_HOST'),
            // 'username' => env('FTP_USER'),
            // 'password' => env('FTP_PASSWORD'),
            // 'root' => env('FTP_ROOT_POST_IMAGES'),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
