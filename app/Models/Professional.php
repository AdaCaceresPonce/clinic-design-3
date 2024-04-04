<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    use HasFactory;

    //Relacion muchos a muchos con la tabla especialidades
    public function specialties(){
        return $this->belongsToMany('App\Models\Specialty');
    }
}
