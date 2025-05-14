<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TramiteItem;

class Tramite extends Model
{
    //

    public function items()
    {
        return $this->hasMany(TramiteItem::class);
    }
}
