<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushMessage;
use NotificationChannels\WebPush\WebPushChannel;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class WebPush extends Notification
{
    use Queueable;

    /**
     * title notification
     * @var string
     */
    private $title;

    /**
     * body notification
     * @var string
     */
    private $body;
    
    /**
     * data notification
     * @var any
     */
    private $data;
    /**
     * data notification
     * @var any
     */
    private $icon;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $title, string $body, string $icon ,$data)
    {
        // echo($data); // Array to string conversion (error)
        $this->title = $title;
        $this->body = $body;
        $this->icon = $icon;
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [WebPushChannel::class];
    }
    public function toWebPush($notifiable, $notification)
    {
        
        // dd("hola");
        
        return (new WebPushMessage) 
            ->title($this->title)
            ->icon('storage/'.$this->icon)  //supongo que tambien se le puede pasar una variable con el icono
            ->body($this->body) 
            // ->image('http://localhost/images/avatar_default.png')  //esto no funciona
            // ->action('View App', 'notification_action')
              ->data($this->data); //aqui va la url
    }

   
}
