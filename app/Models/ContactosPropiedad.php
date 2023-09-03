<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ContactosPropiedad
 *
 * @property $id
 * @property $tipoRelacion
 * @property $observaciones
 * @property $product_id
 * @property $contacto_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Contacto $contacto
 * @property Product $product
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ContactosPropiedad extends Model
{
    
    static $rules = [
		'tipoRelacion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipoRelacion','observaciones','product_id','contacto_id'];


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
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
    

}
