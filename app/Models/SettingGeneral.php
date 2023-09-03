<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SettingGeneral
 *
 * @property $id
 * @property $moneda
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SettingGeneral extends Model
{
    
    static $rules = [
		'moneda' => 'required',
    'logo_empresa' => 'required'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['moneda','logo_empresa'];



}
