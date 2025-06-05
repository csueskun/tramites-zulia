<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Models\TramiteItem;

class Tramite extends Model
{
    //
    use HasFactory, Notifiable;

    public function items()
    {
        return $this->hasMany(TramiteItem::class);
    }

    public function requerimientos()
    {
        return $this->hasMany(TramiteRquerimiento::class);
    }
}
