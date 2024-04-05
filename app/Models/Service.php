<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
