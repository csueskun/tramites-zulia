<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolicitudItem extends Model
{
    //

    protected $table = 'solicitud_items';

    protected $fillable = [
        'solicitud_id',
        'nombre',
        'tipo',
        'precio',
    ];

}
