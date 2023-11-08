<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AmenitiesCheck
 *
 * @property $id
 * @property $name
 * @property $amenities_id
 * @property $created_at
 * @property $updated_at
 * @property $icon
 *
 * @property PropiedadAmenity[] $propiedadAmenities
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AmenitiesCheck extends Model
{
    
    static $rules = [
		'name' => 'required',
		'amenities_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','amenities_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function propiedadAmenities()
    {
        return $this->hasMany('App\Models\PropiedadAmenity', 'amenities_checks_id', 'id');
    }
    
    public function amenitiess()
    {
        return $this->belongsTo('App\Models\Amenities','amenities_id','id');
    }

}
