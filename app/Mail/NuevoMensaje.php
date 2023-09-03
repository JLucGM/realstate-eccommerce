<?php

//how to create a user in laravel?


namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NuevoMensaje extends Mailable
{
    use Queueable, SerializesModels;


     public $user;
     public $mensaje;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$mensaje)
    {
         $this->user = $user;
        $this->mensaje = $mensaje;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->markdown('emails.NuevoMensaje')->with('user', $this->user)->with('mensaje',$this->mensaje)->subject('Nuevo Mensaje!');

    }
}
