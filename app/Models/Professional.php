<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    //Relacion muchos a muchos con la tabla especialidades
    public function specialties(){
        return $this->belongsToMany('App\Models\Specialty');
    }
}
