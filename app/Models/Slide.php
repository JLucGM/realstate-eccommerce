<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Slide
 *
 * @property $id
 * @property $image
 * @property $active
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Slide extends Model
{
    
    static $rules = [
		'image' => 'required',
		'title' => 'required',
		'texto' => 'required',


    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['image','active','texto','title'];



}
