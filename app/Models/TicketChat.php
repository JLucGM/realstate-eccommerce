<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TicketChat
 *
 * @property $id
 * @property $mensaje
 * @property $sender_id
 * @property $receiver_id
 * @property $mensajes_soporte_id
 * @property $created_at
 * @property $updated_at
 *
 * @property MensajesSoporte $mensajesSoporte
 * @property User $user
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TicketChat extends Model
{
  public $table = 'ticket_chat';

    
    static $rules = [
		'mensaje' => 'required',
		'sender_id' => 'required',
		'receiver_id' => 'required',
		'mensajes_soporte_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['mensaje','sender_id','receiver_id','mensajes_soporte_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mensajesSoporte()
    {
        return $this->hasOne('App\Models\MensajesSoporte', 'id', 'mensajes_soporte_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
   public function receiver()
    {
        return $this->hasOne('App\Models\Contacto', 'id', 'receiver_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sender()
    {
        return $this->hasOne('App\Models\User', 'id', 'sender_id');
    }
    

}
