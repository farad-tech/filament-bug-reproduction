<?php

namespace App\CustomNotification;

use App\Http\Controllers\User\NotificationController;

interface UserNotification
{

  public static function send($user_id, array $data): void;

  
}
