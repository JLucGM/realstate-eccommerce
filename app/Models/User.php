<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use NotificationChannels\WebPush\HasPushSubscriptions;


use Spatie\Permission\Traits\HasRoles;



/**
 * Class User
 * @package App\Models
 * @version February 24, 2022, 2:21 pm UTC
 *
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $avatar
 */
class User extends Authenticatable
{
     use HasRoles, HasPushSubscriptions, Notifiable;

  public $table = 'users';
    

    public $fillable = [
        'name',
        'email',
        'password',
        'whatsapp',
        'avatar',
        'status',
        'rol',
        'country_id',
        'city_id',
        'last_name',
        'device_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'whatsapp' => 'string',
        'avatar' => 'string',
        'status' => 'boolean',
        'rol'=>'string',
        'country_id' => 'integer',
        'city_id' => 'integer'

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'last_name' => 'required',
        'email' => 'required',
        'password' => 'confirmed',
        // 'avatar' => 'nullable|image|video'
    ];

      public function markets()
    {
        return $this->belongsToMany(\App\Models\Restaurant::class, 'users_restaurants');
    }

    public function scopeOrdenar($query,$orden){
        if ($orden) {
            return $query->orderBy('id','desc');       
        }
    }

}
