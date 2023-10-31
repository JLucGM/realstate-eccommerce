<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropiedadAmenities extends Model
{
    use HasFactory;

    public $table = 'propiedad_amenities';

     public $timestamps = false;

     static $rules = [
        'user_id' => 'required',
        'amenities_checks_id' => 'required',
     ];
        public $fillable = [
        'user_id',
        'amenities_checks_id',
       
    ];

         public function amenitiesCheck()
    {
        return $this->belongsTo('App\Models\AmenitiesCheck','amenities_checks_id','id');
    }


}
