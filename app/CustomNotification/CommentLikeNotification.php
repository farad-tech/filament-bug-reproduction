<?php

namespace App\CustomNotification;

use App\Http\Controllers\User\NotificationController;

class CommentLikeNotification implements UserNotification
{

  public static function send($user_id, $data): void
  {

    NotificationController::sendToUser(
      $user_id,
      __('messages.comment_like_notif_title'),
      __('messages.comment_like_notif_text', $data)
    );
    
  }
}
