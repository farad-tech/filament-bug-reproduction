<?php

namespace App\CustomNotification;

use App\Http\Controllers\User\NotificationController;

class ChatNotification implements UserNotification
{

  public static function send($user_id, $data): void
  {

    NotificationController::sendToUser(
      $user_id,
      __('messages.chat_notif_title'),
      __('messages.chat_notif_text', $data)
    );
    
  }
}
