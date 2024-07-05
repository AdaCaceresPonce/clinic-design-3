<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastname',
        'service_slug',
        'contact_number',
        'message',
        'state',
    ];

    //Relacion uno a muchos inversa
    public function service(){
        return $this->belongsTo(Service::class, 'service_slug');
    }

}
