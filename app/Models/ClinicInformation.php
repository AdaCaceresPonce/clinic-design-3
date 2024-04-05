<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicInformation extends Model
{
    use HasFactory;

    protected $table = 'clinic_information';

    protected $fillable = [
        'phone',
        'cellphone',
        'schedule',
        'email',
        'address',
        'navbar_clinic_logo',
        'footer_clinic_logo',
        'facebook_link',
        'twitter_link',
        'instagram_link',
    ];
}
