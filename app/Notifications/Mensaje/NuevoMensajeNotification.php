<?php

namespace App\Notifications\Mensaje;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\TicketChat;
use App\Models\User;
use Carbon\Carbon;


class NuevoMensajeNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
  public function __construct(User $user, TicketChat $ticketChat)
    {
      $this->user = $user;
      $this->ticketChat = $ticketChat;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
     public function toArray($notifiable)
    {
        return [
          
            'id' => $this->ticketChat->id,
            'mensaje' => $this->ticketChat->mensaje, 
            'recibido' => $this->user->id,
            'time' => Carbon::now()->diffForHumans(),
            'title' =>'Nuevo Mensaje'
        ];
    }
}
