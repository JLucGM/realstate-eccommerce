<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

      public $table = 'webPushNotification';

    public $fillable = [
        'title',
        'body',
        'link'
        // 'image',
        // 'icon'
    ];
}
