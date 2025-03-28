<?php

namespace App\CustomNotification;

use App\Http\Controllers\User\NotificationController;

class FollowNotification implements UserNotification
{

  public static function send($user_id, $data): void
  {

    NotificationController::sendToUser(
      $user_id,
      __('messages.follow_notif_title'),
      __('messages.follow_notif_text', $data)
    );
    
  }
}