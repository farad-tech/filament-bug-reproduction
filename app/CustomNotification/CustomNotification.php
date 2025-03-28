<?php

namespace App\CustomNotification;

use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class CustomNotification
{


  protected $token;
  protected $title;
  protected $body;
  protected $imageUrl;

  public function __construct($token, $title, $body, $imageUrl)
  {

    $this->token = $token;
    $this->title = $title;
    $this->body = $body;
    $this->imageUrl = $imageUrl;
  }

  public function send(): void
  {

    $messaging = app('firebase.messaging');

    $notification = Notification::create($this->title, $this->body);

    $notification->withImageUrl($this->imageUrl);

    $message = CloudMessage::withTarget(
      'token',
      $this->token
    )
      ->withNotification($notification);

    $messaging->send($message);
  }
}
