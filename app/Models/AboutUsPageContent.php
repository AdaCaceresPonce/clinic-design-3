<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsPageContent extends Model
{
    use HasFactory;

    protected $table = 'about_us_page_contents';

    protected $fillable = [
        'cover_title',
        'cover_img',
        'about_us_title',
        'about_us_description',
        'about_us_img',
        'free_title_1',
        'free_description_1',
        'free_title_2',
        'free_description_2',
        'free_img',
    ];
}
