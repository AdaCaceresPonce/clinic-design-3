<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastname',
        'service_id',
        'opinion',
        'state',
        'is_published'
    ];

    //Relacion uno a muchos inversa
    public function service(){
        return $this->belongsTo(Service::class);
    }
}
