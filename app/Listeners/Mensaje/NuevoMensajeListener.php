<?php

namespace App\Listeners\Mensaje;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Notifications\Mensaje\NuevoMensajeNotification;
use Illuminate\Support\Facades\Notification;

class NuevoMensajeListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
           Notification::send($event->user, new NuevoMensajeNotification($event->user,$event->ticketChat));
      
    }
}
