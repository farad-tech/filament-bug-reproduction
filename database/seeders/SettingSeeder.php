<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'آدرس هاست FTP',
                'FTP_HOST',
                env('FTP_HOST', '-'),
            ],
            [
                'نام کاربری حساب FTP',
                'FTP_USER',
                env('FTP_USER', '-'),
            ],
            [
                'کلمه عبور حساب FTP',
                'FTP_PASSWORD',
                env('FTP_PASSWORD', '-'),
            ],
            [
                'پورت FTP',
                'FTP_PORT',
                env('FTP_PORT', '21'),
            ],
            [
                'آدرس روت پستهای تصاویر FTP',
                'FTP_ROOT_POST_IMAGES',
                env('FTP_ROOT_POST_IMAGES', '-'),
            ],
            [
                'آدرس روت پستهای ویدیویی و ریلز FTP',
                'FTP_ROOT_POST_VIDEOS',
                env('FTP_ROOT_POST_VIDEOS', '-'),
            ],
            [
                'آدرس روت تامنیل پست FTP',
                'FTP_ROOT_POST_THUMBNAIL',
                env('FTP_ROOT_POST_THUMBNAIL', '-'),
            ],
            [
                'آدرس روت تصاویر پروفایل FTP',
                'FTP_ROOT_PROFILE_IMAGES',
                env('FTP_ROOT_PROFILE_IMAGES', '-'),
            ],
            [
                'آدرس روت فایل چتها FTP',
                'FTP_ROOT_CHAT_FILES',
                env('FTP_ROOT_CHAT_FILES', '-'),
            ],
            [
                'آدرس دامنه FTP با https://',
                'FTP_DOMAIN',
                env('FTP_DOMAIN', '-'),
            ],
            [
                'شعاع پستهای نزدیک اکسپلور (km)',
                'EXPLORE_POSTS_RADIUS',
                100,
            ],
            [
                'اجباری بودن وارد کردن کد دعوت 1: بله 0: خیر',
                'MANDATORY_INVITATION_CODE',
                0,
            ],
            [
                'مقدار مبلغ پرداختی به دعوت کننده ها (به تومان)',
                'INVITATION_INCOME_PER_INVITE',
                '2000'
            ],
            [
                'مدت زمان استوری (روز)',
                'STORY_LENGTH',
                '1'
            ],
            [
                'آیدی برنامه پوشر (pusher.com)',
                'PUSHER_APP_ID',
                ''
            ],
            [
                'کلید برنامه پوشر (pusher.com)',
                'PUSHER_APP_KEY',
                ''
            ],
            [
                'سکرت برنامه پوشه (pusher.com)',
                'PUSHER_APP_SECRET',
                ''
            ],
            [
                'دسته برنامه پوشر (pusher.com)',
                'PUSHER_APP_CLUSTER',
                'ap1'
            ],
            [
                'آدرس دیتابیس فایربیس',
                'FIREBASE_DATABASE_URL',
                ''
            ],
            [
                'نسخه فعلی اندروید',
                'CURRENT_ANDROID_VERSION',
                ''
            ],
            [
                'لینک آپدیت اندروید',
                'ANDROID_UPDATE_URL',
                ''
            ]
        ];

        // Setting::truncate();

        foreach ($settings as $setting) {

            $data = [
                'title' => $setting[0],
                'slug' => $setting[1],
                'value' => $setting[2],
            ];

            Setting::createOrFirst($data, $data);
        }
    }
}
