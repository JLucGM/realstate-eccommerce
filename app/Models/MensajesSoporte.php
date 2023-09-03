<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MensajesSoporte
 *
 * @property $id
 * @property $asuntoticket
 * @property $descripcionticket
 * @property $prioridadticket
 * @property $estadoticket
 * @property $archivoticket
 * @property $contacto_id
 * @property $created_at
 * @property $updated_at
 * @property $asignado_id
 * 
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MensajesSoporte extends Model
{
  public $table = 'mensajes_soporte';

    
    static $rules = [
		'asuntoticket' => 'required',
		'descripcionticket' => 'required',
		'prioridadticket' => 'required',
		// 'estadoticket' => 'required',
		// 'archivoticket' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['asuntoticket','descripcionticket','prioridadticket','estadoticket','archivoticket','contacto_id','product_id','asignado_id'];


       public function contactoUser()
    {
        return $this->belongsTo('App\Models\Contacto', 'contacto_id','id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
  
        return $this->belongsTo('App\Models\Product', 'product_id','id');
    }

       public function user()
    {
  
        return $this->belongsTo('App\Models\User', 'asignado_id','id');
    }

}
