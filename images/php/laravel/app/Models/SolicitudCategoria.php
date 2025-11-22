<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolicitudCategoria extends Model
{
    //

    protected $table = 'solicitud_categorias';

    protected $fillable = [
        'solicitud_id',
        'categoria',
    ];

}
