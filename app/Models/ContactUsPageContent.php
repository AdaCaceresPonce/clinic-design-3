<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsPageContent extends Model
{
    use HasFactory;

    protected $table = 'contact_us_page_contents';

    protected $fillable = [
        'cover_title',
        'cover_img',
        'contact_us_title',
        'contact_us_description',
        'contact_us_img',

    ];
}
