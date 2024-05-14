<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WelcomePageContent extends Model
{
    use HasFactory;

    protected $table = 'welcome_page_contents';

    protected $fillable = [
        'cover_title',
        'cover_description',
        'cover_img',
        'about_title',
        'about_description',
        'about_we_offer_you',
        'about_image',
        'our_services_title',
        'our_services_description',
        'our_professionals_title',
        'our_professionals_description',
        'testimonials_title',
        'testimonials_description',
    ];
}
