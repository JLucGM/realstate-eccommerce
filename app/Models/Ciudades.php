<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudades extends Model
{
    use HasFactory;

    public $table = 'ciudades';
    
    static $rules = [
		'name' => 'required',
    ];

    public $fillable = [
        'name',
        'estado_id',
     
    ];

    public function estados()
{
    return $this->belongsTo('App\Models\Estado', 'estado_id', 'id');
}

}
