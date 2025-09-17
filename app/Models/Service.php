<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'small_description',
        'long_description',
        'card_img_path',
        'cover_img_path',
        'additional_info',
    ];


    public function getRouteKeyName(){
        return 'slug';
    }


    //Accesor para imagen
    protected function cardImg(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->card_img_path ? Storage::url($this->card_img_path) : asset('img/no-image.jpg'),
        );
    }
    
    //Relacion uno a muchos con la tabla consultas
    public function inquiries(){
        return $this->hasMany(Inquiry::class);
    }

    //Relacion uno a muchos con la tabla opiniones
    public function opinions(){
        return $this->hasMany(Opinion::class);
    }

}
