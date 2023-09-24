<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPropiedad extends Model
{
    use HasFactory;
    public function propiedad()
{
    return $this->hasOne('App\Models\Propiedad', 'tipoPropiedad_id', 'id');
}

}
