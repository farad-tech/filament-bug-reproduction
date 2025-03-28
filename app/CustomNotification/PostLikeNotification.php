<?php

namespace App\CustomNotification;

use App\Http\Controllers\User\NotificationController;

class PostLikeNotification implements UserNotification
{

  public static function send($user_id, $data): void
  {

    NotificationController::sendToUser(
      $user_id,
      __('messages.liked_notif_title'),
      __('messages.liked_notif_text', $data)
    );
    
  }
}
