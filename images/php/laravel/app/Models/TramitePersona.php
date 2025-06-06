<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TramitePersona extends Model
{
    //

    protected $table = 'tramite_personas';

    protected $fillable = [
        'tramite_id',
        'persona',
    ];

}
