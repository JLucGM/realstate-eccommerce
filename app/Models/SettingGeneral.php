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
    'logo_empresa' => 'required',
    'status_section_one' => 'required',
    'status_section_two' => 'required',
    'status_section_three' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['moneda','logo_empresa','status_section_one','status_section_two','status_section_three'];


    public function monedaSetting()
    {
        return $this->belongsTo(Monedas::class, 'moneda');
    }
}
