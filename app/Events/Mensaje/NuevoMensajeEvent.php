<?php

namespace App\Events\Mensaje;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NuevoMensajeEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $user;
    public $ticketChat;

    /**
     * Create a new event instance.
     *
     * @return void
     */
  public function __construct($user,$ticketChat)
    {
          $this->user = $user;
        $this->ticketChat = $ticketChat;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
