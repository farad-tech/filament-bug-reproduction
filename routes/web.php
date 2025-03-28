<?php

use App\Events\ChatPusherEvent;
use App\Http\Controllers\Auth\Authcontroller;
use App\Livewire\Install\AdminUser;
use App\Livewire\Install\BasicDetails;
use App\Livewire\Install\DbConnection;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Intervention\Image\ImageManager;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

  $installedJsonPath = storage_path('app'.DIRECTORY_SEPARATOR.'installed.json');

  if(file_exists($installedJsonPath)) {
    return redirect('/admin');

  } else {

    return redirect()->route('install.basic-details');
  }
});

Route::prefix('install')->middleware(['checkinstalled'])->group(function () {

  Route::get('step-one', BasicDetails::class)->name('install.basic-details');

  Route::get('step-two', DbConnection::class)->name('install.db-connection')->middleware('dbconnectionpermission');

  Route::get('step-three', AdminUser::class)->name('install.admin-user')->middleware('adminuserpermission');

});

Route::get('test', function () {
  dd(Artisan::call('migrate'));
});
