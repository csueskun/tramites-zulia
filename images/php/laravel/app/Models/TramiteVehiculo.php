<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TramiteVehiculo extends Model
{
    //

    protected $table = 'tramite_vehiculos';

    protected $fillable = [
        'tramite_id',
        'vehiculo',
    ];

}
