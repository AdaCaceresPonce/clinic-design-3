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

    protected $primaryKey = 'slug';
    public $incrementing = false;    // La clave primaria no es incremental
    protected $keyType = 'string';


    protected function img(): Attribute
    {
        return Attribute::make(
            get: fn() => Storage::url($this->card_img_path),
        );
    }
    
    //Relacion uno a muchos con la tabla consultas
    public function inquiries(){
        return $this->hasMany(Inquiry::class);
    }

}
