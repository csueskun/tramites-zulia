<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TramiteRquerimiento extends Model
{
    //

    protected $table = 'tramite_rquerimientos';

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
