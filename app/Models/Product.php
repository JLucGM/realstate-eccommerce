<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;
  

  public $table = 'products';


  public $fillable = [
        'name',
     'price',
     'status',
    //  'category',
     'description',
     'details',
     'portada',
     'statusActual',
     'moneda',
     'publicar',
     'dormitorios',
     'ambientes',
     'toilet',
     'metrosCuadradosT',
     'metrosCuadradosC',
     'estrenar',
     'expensas',
     'cocheras',
     'videoTipo',
     'linkVideo',
     'pais',
     'region',
     'ciudad',
     'latitud',
     'longitud',
     'direccion',
     'tipoPropiedad_id',
     'destacado',
    ];


    public function scopeOrdenar($query,$orden){
        if ($orden) {
            return $query->orderBy('id','desc');       
        }
    }
        public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
              ->width(150)
              ->height(150)
              ->sharpen(10);
    }

     public function agente()
    {
        return $this->hasOne('App\Models\PropiedadAgente','product_id','id');
    }
     public function tipopropiedad()
    {
        return $this->hasOne('App\Models\TipoPropiedad','id','tipoPropiedad_id');
    }

      public function amenities()
    {
        return $this->hasMany('App\Models\PropiedadAmenities','product_id','id');
    }
}
