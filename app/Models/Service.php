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
        'card_image_path',
        'cover_image_path',
        'additional_info',
    ];


    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn() => Storage::url($this->card_image_path),
        );
    }
    

    public function getRouteKeyName(){
        return 'slug';
    }

}
