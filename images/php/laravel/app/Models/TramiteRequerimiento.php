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
        'file_metadata',
    ];

    public function tramite()
    {
        return $this->belongsTo(Tramite::class);
    }

    public function getFileMetadataAttribute($value)
    {
        return json_decode($value, true);
    }

}
