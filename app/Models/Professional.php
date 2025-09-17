<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Professional extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastname',
        'description',
        'photo_path',
        'facebook_link',
        'linkedin_link',
        'twitter_link',
        'instagram_link',
    ];

    //Accesor para imagen
    protected function photo(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->photo_path ? Storage::url($this->photo_path) : asset('img/no-image.jpg'),
        );
    }

    //Relacion muchos a muchos con la tabla especialidades
    public function specialties()
    {
        return $this->belongsToMany('App\Models\Specialty');
    }

}
