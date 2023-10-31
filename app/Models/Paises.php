<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{
    use HasFactory;

    protected $table = 'paises';

    static $rules = [
		'name' => 'required',
    ];

    protected $fillable = [
        'name',
    ];

    // public function municipio()
    // {
    //     return $this->belongsTo(Municipio::class);
    // }
}
