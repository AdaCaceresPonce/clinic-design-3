<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurProfessionalsPageContent extends Model
{
    use HasFactory;

    protected $table = 'our_professionals_page_contents';

    protected $fillable = [
        'cover_title',
        'cover_img',
        'our_professionals_title',
        'our_professionals_description',
        'our_professionals_img',
        'our_professionals_team_title',
        'our_professionals_team_description',

    ];
}
