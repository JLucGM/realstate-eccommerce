<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Contacto
 *
 * @property $id
 * @property $name
 * @property $apellido
 * @property $email
 * @property $telefonoContacto1
 * @property $telefonoContacto2
 * @property $origen
 * @property $status
 * @property $pais
 * @property $region
 * @property $ciudad
 * @property $direccion
 * @property $observaciones
 * @property $created_at
 * @property $updated_at
 *
 * @property ContactosPropiedad[] $contactosPropiedads
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Contacto extends Model
{
    
    static $rules = [
		'name' => 'required',
		'apellido' => 'required',
		'email' => 'required',
		'telefonoContacto1' => 'required',
		'telefonoContacto2' => 'required',
		'origen' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','apellido','email','telefonoContacto1','telefonoContacto2','origen','status','pais','region','ciudad','direccion','observaciones','user_id','vendedorAgente_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contactosPropiedads()
    {
        return $this->hasMany('App\Models\ContactosPropiedad', 'contacto_id', 'id');
    }

      public function user()
    {
  
        return $this->belongsTo('App\Models\User', 'user_id','id');
    }

       public function vendedorAgente()
    {
  
        return $this->belongsTo('App\Models\User', 'vendedorAgente_id','id');
    }
    

}
