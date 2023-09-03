<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropiedadAgente extends Model
{
    use HasFactory;

    public $table = 'propiedad_agente';

     public $timestamps = false;

        public $fillable = [
        'user_id',
        'product_id',
       
    ];


     public function producto()
    {
        return $this->belongsTo('App\Models\Product');
    }

         public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
