<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TramiteRequerimiento extends Model
{
    //

    protected $table = 'tramite_requerimientos';

    protected $fillable = [
        'tramite_id',
        'nombre',
        'descripcion',
    ];

    public function tramite()
    {
        return $this->belongsTo(Tramite::class);
    }
}
