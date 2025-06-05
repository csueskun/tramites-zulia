<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    //
    protected $fillable = [
        'tipo',
        'ruta',
        'responsable',
        'solicitud_id',
    ];

    public function getFullTipoAttribute()
    {
        return expandAbbreviation($this->tipo);
    }
}
