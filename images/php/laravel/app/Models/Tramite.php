<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Models\TramiteItem;
use App\Models\TramiteRequerimiento;
use App\Models\TramiteVehiculo;
use App\Models\TramitePersona;

class Tramite extends Model
{
    //
    use HasFactory, Notifiable;

    public function items()
    {
        return $this->hasMany(TramiteItem::class);
    }

    public function costos()
    {
        return $this->items()->where('tipo', 'COSTO');
    }
    public function estampillas()
    {
        return $this->items()->where('tipo', 'ESTAMPILLA');
    }
    public function vehiculos()
    {
        return $this->hasMany(TramiteVehiculo::class);
    }
    public function personas()
    {
        return $this->hasMany(TramitePersona::class);
    }

    public function requerimientos()
    {
        return $this->hasMany(TramiteRequerimiento::class);
    }
}
