<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Task
 *
 * @property $id
 * @property $name
 * @property $tipoTarea
 * @property $horaInicio
 * @property $horaFin
 * @property $description
 * @property $status
 * 
 * @property $contacto_id
 * @property $product_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Contacto $contacto
 * @property Product $product
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Task extends Model
{
    
    static $rules = [
		'name' => 'required',
		'tipoTarea' => 'required',
		'horaInicio' => 'required',
		'horaFin' => 'required',
		'description' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','tipoTarea','horaInicio','horaFin','description','contacto_id','product_id','status'];


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
