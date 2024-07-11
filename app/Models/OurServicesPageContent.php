<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurServicesPageContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'cover_title',
        'cover_img',
        'our_services_title',
        'our_services_description',
        'our_services_img',
        'services_we_offer_title',
        'services_we_offer_description',
    ];
}
