برنامه نویس: فرهاد کرمی – Farhad Karami H.

مستندات پروژه iAds (سمت سرور)

ریسپانس های دریافتی از سمت سرور در قالب json، به وسیله Rest API و به صورت زیر هستند:
 

روتهای وب سرویس:
نکات مهم
•	تمامی روتها یک پیشوند /api/v1/ دارند
•	هدر Accept: application/json را برای تمامی روتها همراه با رکوئستها ارسال کنید
•	برای بخش پنل کاربری و بخشهایی که نیاز به Authorization دارند، هدر زیر را هم ارسال کنید:
o	Authorization: Bearer authorization-token

بخش ورود و ثبت نام

ثبت نام کاربر جدید:
1.	register
a.	Method: POST
b.	Params: username, phone_number, password, password_confirmation
c.	Conditions:
i.	username: required,
ii.	phone_number: required, digits: 11, starts with: 0 
iii.	password: required, min digits: 6, max digits: 16, with confirmation

بررسی در دسترس بودن نام کاربری:
بررسی در دسترس بودن نام کاربری جهت ثبت نام کاربر جدید (این مورد در سمت سرور هنگام ثبت نام انجام میشود اما برای کنترلهای سمت کلاینت و فرانت اند هم نیاز هست این روت وجود داشته باشد)

2.	register/check-username-available
a.	Method: POST
b.	Params: username
c.	Condition:
i.	username: required,

بررسی در دسترس بودن  شماره تلفن همراه:
بررسی در دسترس بودن شماره تلفن همراه جهت ثبت نام کاربر جدید (این مورد در سمت سرور هنگام ثبت نام انجام میشود اما برای کنترلهای سمت کلاینت و فرانت اند هم نیاز هست این روت وجود داشته باشد)

3.	register/check-phonenumber-available
a.	Method: POST
b.	Params: phone_number
c.	Condition: 
i.	phone_number: required, digits: 11, starts with: 0

ارسال کد تایید به شماره همراه:
4.	register/verify-code
a.	Method: POST
b.	Params: phone_number 
c.	Condition: 
i.	phone_number: required, digits: 11, starts with: 0

بررسی صحت کد تایید ارسالی:
5.	register/verify-code/check-code
a.	Method: POST
b.	Params: phone_number, code
c.	Conditions:
i.	phone_number: required, digits: 11, starts with: 0
ii.	code: required, digits: 5

ورود کاربر:  (در این بخش authorization-token از سمت سرور به کلاینت ارسال میشود)
6.	login
a.	Method: POST
b.	Params: username, password
c.	Conditions:
i.	username: required
ii.	password: required, min: 6, max:16

ریست کلمه عبور:
7.	reset-password
a.	Method: POST
b.	Params: phone_number, code, password, password_confirmation
c.	Conditions:
i.	phone_number: required, digits: 11, starts with: 0
ii.	code: digits: 5
iii.	password: min_digits: 6, max_digits: 16, with confirmation



بخش پروفایل کاربری  (نیاز به Authorization)

آپلود فایلها از طریق FTP به سرور مورد نظر ارسال میشوند و نام فایل دریافت میشود. برای اینکه آپلود فایل صحیح انجام شود باید مواردی در فایل .env صحیح تنظیم شوند:

FTP_HOST=iads.testrun.ir
FTP_USER=iads@iads.testrun.ir
FTP_PASSWORD='ftp-password'
FTP_PORT=21
FTP_ROOT_POST_IMAGES="/posts/images"
FTP_ROOT_POST_VIDEOS="/posts/videos"
FTP_ROOT_PROFILE_IMAGES="/profiles"
#To access the file through internet
FTP_DOMAIN='https://iads.testrun.ir'

اطلاعات پروفایل
8.	profile
a.	Method: GET
b.	Message: {usename, image, name, bio, gender, age}

ویرایش اطلاعات پروفایل
9.	profile
a.	Method: POST
b.	Params: username, image, name, bio, gender, age
c.	Conditions:
i.	username: required
ii.	image: jpg, jpeg, png, bmp, gif, svg, or webp

حذف تصویر پروفایل
10.	profile
a.	Method: DELETE
b.	Params: No params needed!

دریافت لیست پستهای کاربر (آپدیت شده در 07 خرداد 1403)
اگر مقدار user_id ارسال نشود لیست پستهای خود کاربر را نمایش میده ولی اگر آیدی کاربر با این پارامتر پاس داده شود، پستهای کاربر موردنظر را نمایش میدهد.
11.	profile/posts
a.	Method: GET
b.	Params: user_id (optional)

مشاهده پست (27 اردیبهشت 1403)
12.	Profile/posts/{post_id}
a.	Method: GET
b.	Params: No params needed!

انتشار پست جدید (آپدیت شده در 05 خرداد 1403)  - (آپدیت شده در 27 خرداد 1403) – (آپدیت شده در  30 خرداد 1403)
اگر نوع پست ریلز هست یک پارامتر reels با مقدار true به سرور ارسال کنید
latitude و longitude به ترتیب عرض و طول جغرافیایی (مختصات جغرافیایی) کاربر که پست را ارسال کرده است میباشد.
13.	profile/posts
a.	Method: POST
b.	Params: post_file, caption, reels (optional), thumbnail (optional), latitude, longitude
c.	Condition:
i.	post_file: must be file (image or video)
ii.	thumbnail: must be file (image)

حذف پست (ایجاد شده در 19 خرداد 1403)
14.	profile/posts/{post_id}
a.	Method: DELETE
b.	Params: There is no params needed

ارسال کامنت برای پست
15.	profile/posts/comments
a.	Method: POST
b.	Params: post_id, replyTo, comment
c.	Condition:
i.	post_id: required,
ii.	replyTo : not required, (is replied to comment id)
iii.	comment: required, string

حذف کامنت
16.	profile/posts/comments/{comment_id}
a.	Method: DELETE
b.	Params: there is no params needed

لیست کامنتهای یک پست
17.	profile/posts/comments/{post_id}
a.	Method: GET
b.	Params: there is no params needed

لایک کردن یک پست
18.	profile/posts/likes
a.	Method: POST
b.	Params: post_id

برداشتن لایک یک پست
19.	profile/posts/likes/{post_id}
a.	Method: DELETE
b.	Params: there is no params needed

لیست لایکهای یک پست
20.	Profile/posts/likes/{post_id}
a.	Method: Get
b.	Params: there is no params needed

لایک کردن یک کامنت (27 اردیبهشت 1403)
21.	profile/posts/comments/likes
a.	Method: POST
b.	Params: comment_id

برداشتن لایک یک کامنت (27 اردیبهشت 1403)
22.	profile/posts/comments/likes/{comment_id}
a.	Method: DELETE
b.	Params: there is no params needed

لیست لایکهای یک کامنت (27 اردیبهشت 1403)
23.	profile/posts/comments/likes/{comment_id}
a.	Method: Get
b.	Params: there is no params needed

فالوو کردن یک کاربر (29 اردیبهشت 1403)
24.	profile/follow-system/follow
a.	Method: POST
b.	Params: follower_id, following_id
c.	Conditions:
i.	follower_id: required, integer
ii.	following_id: required, integer

لغو فالوو کردن یک کاربر (29 اردیبشهت 1403)
25.	profile/follow-system/unfollow
a.	Method: POST
b.	Params: follower_id, following_id
c.	Conditions:
i.	follower_id: required, integer
ii.	following_id: required, integer

لیست فالورهای یک کاربر (29 اردیبهشت 1403)
26.	profile/follow-system/user-followers/{user_id}
a.	Method: GET
b.	Params: no params needed

لیست فالوینگهای یک کاربر (29 اردیبشهت 1403)
27.	profile/follow-system/user-followings/{user_id}
a.	Method: GET
b.	Params: no params needed

حذف کاربر (موقتا – 30 اردیبهشت 1403)
28.	temp/delete-user/{username}
a.	Method: GET
b.	Params: no params needed

لیست پستهای یک هشتگ (31 اردیبهشت 1403)
هشتگ را بدون # در url زیر قرار دهید.
مثلا وقتی در کپشن یک پست هشتگی بصورت #هشتگ قرار داده شود. بر اساس این مورد دیتابیس میان کپشنهای یک پست جستجو میکند و پستهایی که این هشتگ را دارند نمایش میدهد.
29.	profile/hashtag/{hashtag}
a.	Method: GET
b.	Params: no params needed

پستهای فالووینگها (feed) (31 اردیبهشت 1403)-(آپدیت در 26 خرداد 1403)
30.	profile/posts/get/feed
a.	Method: GET
b.	Params: no params needed

جستجوی کاربر (7 خرداد 1403)
برای جستجوی کاربر پارامتر s و مقدار آنرا را بصورت متد گت ارسال کنید. و برای اینکه مشخص کنید چه تعداد رکورد میخوایید دریافت کنید مقدار count را وارد کنید. درصورت خالی بودن یا کلا نبود مقدار count تمام کاربران را برمیگرداند.
31.	profile/search-user
a.	Method: GET
b.	Params: s, count
c.	Conditions:
i.	s: required
ii.	count: optional, integer

پیشنهاد فالو کردن کاربران (24 خرداد 1403)
مقدار count یک مقدار اختیاری است، با قرار دادن آن تعداد مشخصی کاربر رو پیشنهاد میدهد و با قرار ندادن آن لیست تمامی کاربران را نمایش میدهد. این لیست کاربرانی که فالو نشدند را به صورت رندوم نمایش میدهد.
32.	profile/suggested-users-to-follow/{count?}
a.	Method: GET
b.	Params: No params needed


اکسپلور پستها (24 خرداد 1403) – (آپدیت شده در 30 خرداد 1403)
در این حالت هم مانند قبلی مقدار count اختیار میباشد.
latitude و longitude هم در اینجا عرض و طول جغرافیایی (مختصات) کاربری که جستجو میکند میباشد.
33.	profile/explore/{count?}
a.	Method: GET
b.	Params: latitude, longitude

جستجوی هشتگها (01 تیر 1403) – (آپدیت شده در 03 خرداد 1403)
با ارسال کوئری search که مقدار هشتگ با "#" را در خود داشته باشد شما میتوانید لیستی از هشتگهای موجود در پستها دریافت کنید.
34.	profile/hashtag/search/get
a.	Method: POST
b.	Params: search 
c.	Conditions:
i.	search: required
جستجوی متن پستها (02 تیر 1403)
با ارسال کوئری keyword جستجو رو انجام دهید و با مقدار count مشخص کنید چه تعداد پست را برگرداند. اگر count خالی باشد تمامی پستها را برمیگرداند.
35.	profile/posts/caption/search
a.	Method: GET
b.	Params: keyword, count
c.	Conditions:
i.	keyword: required
ii.	count: optional, integer

جستجو براساس لوکیشن (02 تیر 1403) – (آپدیت شده در 03 خرداد 1403)
با ارسال کوئری keyword (نام شهر به فارسی) جستجو رو انجام دهید و با مقدار count مشخص کنید چه تعداد پست را برگرداند. اگر count خالی باشد تمامی پستها را برمیگرداند.

36.	profile/posts/search/by/coordinate
a.	Method: GET
b.	Params: keyword, count
c.	Conditions:
i.	keyword: required
ii.	count: optional, integer

ارسال پیام (07 تیر 1403)
37.	profile/chat
a.	Method: POST
b.	Params: reciever_id, message, file, voice, sticker (sticker id)
c.	Conditions:
i.	reciever_id: integer, required,
ii.	message: string, optional,
iii.	file: file, optional,
iv.	voice: file, audio, optional
v.	sticker: integer, optional

نمایش گفتگو (07 تیر 1403)
38.	profile/chat/{chat_id}
a.	Method: GET
b.	Params: no params needed

حذف پیام از یک گفتگو (07 تیر 1403)
39.	profile/chat/delete-message/{message_id}
a.	Method: DELETE
b.	Params: no params needed

حذف یک گفتگو (07 تیر 1403)
40.	profile/chat/{chat_id}
a.	Method: DELETE
b.	Params: no params needed

لیست استیکرها (07 تیر 1403)
41.	profile/stickers
a.	Method: GET
b.	Params: no params needed

نمایش یک استیکر (07 تیر 1403)
42.	profile/sticker/{sticker_id}
a.	Method: GET
b.	Params: no params needed

ارسال یک استوری (07 تیر 1403)
43.	profile/story
a.	Method: POST
b.	Params: post_file
c.	Conditions:
i.	post_file: required, file

مشاهده یک استوری (07 تیر 1403)
44.	profile/story/{story_id}
a.	Method: GET
b.	Params: no params needed

حذف یک استوری (07 تیر 1403)
45.	profile/story/{story_id}
a.	Method: DELETE
b.	Params: no params needed

مشاهده استوریهای یک کاربر (07 تیر 1403)
46.	profile/story/user/{user_id}
a.	Method: GET
b.	Params: no params needed

لیست استوریهای کاربران دنبال شده (08 تیر 1403)
47.	profile/story/user-following-stories
a.	Method: GET
b.	Params: no params needed

وضعیت تایید خودکار چت (10 تیر 1403)
48.	profile/chat-auto-approve
a.	Method: GET
b.	Params: no params needed

تغییر وضعیت تایید خودکار چت (10 تیر 1403)
وضعیت تایید خودکار چت موافق با مقدار  approve میباشد.
49.	profile/chat-auto-approve
a.	Method: POST
b.	Params: approve
c.	Conditions:
i.	approve: required|boolean


# filament-bug-reproduction
