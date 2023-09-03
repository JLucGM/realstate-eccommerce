<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Negocio
 *
 * @property $id
 * @property $name
 * @property $status
 * @property $presupuestoTotal
 * @property $cantidadDormitorios
 * @property $cantidadBaños
 * @property $contacto_id
 * @property $propiedad_id
 * @property $agente_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Contacto $contacto
 * @property Product $product
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Negocio extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','status','presupuestoTotal','cantidadDormitorios','cantidadBaños','contacto_id','propiedad_id','agente_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function contacto()
    {
        return $this->hasOne('App\Models\Contacto', 'id', 'contacto_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'propiedad_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'agente_id');
    }
    

}
