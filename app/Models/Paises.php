<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{
    use HasFactory;

    protected $table = 'paises';

    protected $fillable = [
        'name',
    ];

    // public function municipio()
    // {
    //     return $this->belongsTo(Municipio::class);
    // }
}
