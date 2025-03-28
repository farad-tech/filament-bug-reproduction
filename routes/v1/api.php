<?php

use App\Http\Controllers\Apk\ApkController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerifyCodeController;
use App\Http\Controllers\User\BlockingController;
use App\Http\Controllers\User\BookmarkController;
use App\Http\Controllers\User\ChatAutoApprovalController;
use App\Http\Controllers\User\ChatController;
use App\Http\Controllers\User\DeleteAccountController;
use App\Http\Controllers\User\FollowController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\CommentsLikesController;
use App\Http\Controllers\User\ExploreController;
use App\Http\Controllers\User\Group\GroupController;
use App\Http\Controllers\User\Group\GroupLinkHashController;
use App\Http\Controllers\User\Group\GroupMessageController;
use App\Http\Controllers\User\HashtagController;
use App\Http\Controllers\User\HighlightController;
use App\Http\Controllers\User\InvitationController;
use App\Http\Controllers\User\NotificationController;
use App\Http\Controllers\User\PostLinkController;
use App\Http\Controllers\User\PostsLikesController;
use App\Http\Controllers\User\PostsController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\ReferralController;
use App\Http\Controllers\User\ReportController;
use App\Http\Controllers\User\StickerController;
use App\Http\Controllers\User\StoryController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\WalletController;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



/**
 * 
 * Register, login and reset password routes
 * 
 */
Route::prefix('register')->group(function () {

  Route::post('/check-username-available', [RegisterController::class, 'checkUsernameAvailable']);
  Route::post('/check-phonenumber-available', [RegisterController::class, 'checkPhonenumberAvailable']);
  Route::post('/verify-code/check-code', [VerifyCodeController::class, 'checkCode']);
  Route::apiResource('/verify-code', VerifyCodeController::class)->only('store'); //->middleware('throttle:1,1');
  Route::apiResource('/register', RegisterController::class)->only('store');
});

Route::post('login', [LoginController::class, 'loginReq']);

Route::post('reset-password', [ResetPasswordController::class, 'resetPassword']);
Route::post('reset-password/check-code', [ResetPasswordController::class, 'checkCode']);


/**
 * 
 * Profile routes
 * 
 */
Route::prefix('profile')
  ->middleware([
    'auth:sanctum',
    'ftpaccount',
    'pusherconfig',
    'firebaseconfig',
    'lastActivity'
  ])
  ->group(function () {

    Route::delete('/', [ProfileController::class, 'destroy']);
    Route::apiResource('/', ProfileController::class)->only('index', 'store');

    Route::get('/get-post-by-hash/{hash}', [PostLinkController::class, 'getPostByHash']);
    Route::apiResource('/posts', PostsController::class)->only('index', 'store', 'show', 'destroy');

    Route::prefix('/posts')->group(function () {

      Route::apiResource('/comments', CommentController::class)->only('show', 'store', 'destroy');
      Route::apiResource('/comments/likes', CommentsLikesController::class)->only('show', 'store', 'destroy');
      Route::apiResource('/likes', PostsLikesController::class)->only('store', 'show', 'destroy');

      Route::get('/get/feed', [PostsController::class, 'feed']);

      Route::get('/search/caption', [PostsController::class, 'searchCaption']);

      Route::get('/search/by/coordinate', [PostsController::class, 'searchByCoordinate']);

      Route::get('/get/reels', [PostsController::class, 'reels']);
    });

    Route::prefix('/follow-system')->group(function () {

      Route::post('/unfollow', [FollowController::class, 'unfollow']);
      Route::post('/follow', [FollowController::class, 'follow']);
      Route::get('/user-followers/{user_id}', [FollowController::class, 'userFollowers']);
      Route::get('/user-followings/{user_id}', [FollowController::class, 'userFollowings']);
    });

    Route::get('suggested-users-to-follow/{count?}', [UserController::class, 'suggestedUsersToFollow']);

    Route::apiResource('hashtag', HashtagController::class)->only('show');
    Route::post('hashtag/search/get', [HashtagController::class, 'search']);

    Route::get('search-user', [UserController::class, 'search']);

    Route::get('get-user-profile/{username}', [ProfileController::class, 'getProfileFromUsernameRequest']);

    Route::get('explore/{count?}', [ExploreController::class, 'index']);

    Route::delete('/chat/delete-message/{message_id}', [ChatController::class, 'destroyMessage']);
    Route::apiResource('/chat', ChatController::class)->only('index', 'store', 'show', 'destroy');

    Route::apiResource('/stickers', StickerController::class)->only('index', 'show');

    Route::get('/story/user-following-stories', [StoryController::class, 'userFollowingStories']);
    Route::get('/story/user/{user_id}', [StoryController::class, 'userStories']);
    Route::apiResource('/story', StoryController::class)->only('store', 'destroy', 'show');

    Route::apiResource('/chat-auto-approve', ChatAutoApprovalController::class)->only('index', 'store');

    Route::post('/invitation-code', [InvitationController::class, 'checkInvitationCodeExists']);
    Route::apiResource('/invitation-code', InvitationController::class)->only('index');

    Route::get('check-invitation-code-requirement', [InvitationController::class, 'checkInvitationCodeRequirement']);

    Route::get('get-wallet-balance', [WalletController::class, 'getBalance']);

    Route::post('report-comment', [ReportController::class, 'reportComment']);
    Route::post('report-post', [ReportController::class, 'reportPost']);

    Route::apiResource('bookmark-post', BookmarkController::class)->except('update');

    Route::post('delete-account', [DeleteAccountController::class, 'delete']);

    Route::apiResource('highlight', HighlightController::class);
    Route::post('highlight/add', [HighlightController::class, 'addStory']);
    Route::post('highlight/remove', [HighlightController::class, 'removeStory']);

    Route::put('set-private', [UserController::class, 'setPrivate']);
    Route::put('set-public', [UserController::class, 'setPublic']);

    Route::post('block-user', [BlockingController::class, 'block']);
    Route::post('un-block-user', [BlockingController::class, 'unblock']);

    Route::put('set-user-online', [ProfileController::class, 'setOnline']);
    Route::put('set-user-offline', [ProfileController::class, 'setOffline']);

    Route::get('notifications', [NotificationController::class, 'index']);

    Route::prefix('group')->group(function () {

      Route::post('new', [GroupController::class, 'new']);

      Route::post('join', [GroupController::class, 'join']);

      Route::get('get-joined-groups', [GroupController::class, 'getGroups']);

      Route::put('silent-users', [GroupController::class, 'silent_users']);

      Route::put('unsilent-users', [GroupController::class, 'unsilent_users']);

      Route::apiResource('chat', GroupMessageController::class)->except('update', 'index');

      Route::prefix('hash')->group(function () {

        Route::get('retrieve/{group_hash}', [GroupLinkHashController::class, 'retrieveURLToAPI']);

        Route::get('renew/{group_hash}', [GroupLinkHashController::class,'renewRequest']);

        Route::get('join/{hash}', [GroupLinkHashController::class, 'joinGroupWithUrl']);

      });

      Route::get('add-to-group/{group-id}/{username}', [GroupController::class,'addUserByUsername']);

    });

  });

Route::get('apk-info', [ApkController::class, 'get_info']);


// Route::prefix('temp')->group(function () {

//   Route::get('/delete-user/{username}', function ($username) {
//     $user = User::where('user_name',$username)->first();
//     User::where('user_name',$username)->delete();
//     Profile::where('user_id', $user->id)->delete();
//   });

//   Route::get('cache-clear', function () {

//     Artisan::call('cache:clear');

//   });


// });
