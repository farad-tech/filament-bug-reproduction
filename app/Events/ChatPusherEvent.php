<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatPusherEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    public $channel;

    public function __construct($message, $channel)
    {
        $this->message = $message;
        $this->channel = $channel;

    }
  
    public function broadcastOn()
    {
        return [$this->channel];
    }
  
    public function broadcastAs()
    {
        return 'my-event';
    }
}
