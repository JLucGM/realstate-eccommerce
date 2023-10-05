<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monedas extends Model
{
    use HasFactory;

    public $table = 'monedas';
    

    public $fillable = [
        'id',
        'tipo',
        'denominacion',
        
     
    ];

    public function settingGeneral()
    {
        return $this->hasOne(SettingGeneral::class, 'moneda');
    }
}
