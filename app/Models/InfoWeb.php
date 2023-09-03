<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InfoWeb
 *
 * @property $id
 * @property $select_us
 * @property $sell_home
 * @property $rent_home
 * @property $buy_home
 * @property $marketing_free
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class InfoWeb extends Model
{

  public $table = 'info_web';
    
    static $rules = [
		'select_us' => 'required',
		'sell_home' => 'required',
		'rent_home' => 'required',
		'buy_home' => 'required',
		'marketing_free' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['select_us','sell_home','rent_home','buy_home','marketing_free'];



}
