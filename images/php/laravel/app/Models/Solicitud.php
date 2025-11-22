<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Documento;
use App\Models\Comentario;
use App\Models\Tramite;
use App\Models\SolicitudItem;

class Solicitud extends Model
{
    use HasFactory;
    
    protected $table = 'solicitudes';
    
    protected $casts = [
        'fecha_aprobacion' => 'datetime',
        'fecha_validacion' => 'datetime',
    ];

    protected $fillable = [
        'estado',
        'usuario_id',
        'radicado',
        'asunto',
        'fecha_aprobacion',
        'fecha_validacion',
        'tramite_id',
        'nombres',
        'tipo_documento',
        'identificacion',
        'telefono',
        'vehiculo',
        'persona',
        'link_pago'
    ];
    
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
    public function tramite()
    {
        return $this->belongsTo(Tramite::class);
    }

    public function documentos()
    {
        return $this->hasMany(Documento::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function getDocumentosUsuarioAttribute()
    {
        return $this->documentos->where('responsable', 'USER');
    }

    public function getReciboPagoAttribute()
    {
        return $this->documentos->where('tipo', 'RECIBO DE PAGO')->last();
    }

    public function getConstanciaPagoAttribute()
    {
        return $this->documentos->where('tipo', 'CONSTANCIA DE PAGO')->last();
    }

    public function getCertificadoAttribute()
    {
        return $this->documentos->where('tipo', 'CERTIFICADO')->last();
    }

    public function getConstanciaPagoTnsAttribute()
    {
        return $this->documentos->where('tipo', 'CONSTANCIA DE PAGO TNS')->last();
    }

    public function getConstanciaPagoCuplAttribute()
    {
        return $this->documentos->where('tipo', 'CONSTANCIA DE PAGO CUPL')->last();
    }
    public function categorias()
    {
        return $this->hasMany(SolicitudCategoria::class);
    }

    public function saveItems()
    {
        $multiCat = $this->categorias()->count() > 1;
        SolicitudItem::where('solicitud_id', $this->id)->delete();
        $this->tramite->items->where('vehiculo', $this->vehiculo)->where('persona', $this->persona)->each(function($item) use($multiCat) {
            $solicitudItem = new SolicitudItem();
            $solicitudItem->solicitud_id = $this->id;
            $solicitudItem->nombre = $item->nombre;
            $solicitudItem->tipo = $item->tipo;
            $solicitudItem->cantidad = 1;
            if($multiCat) {
                if($item->tipo == 'ESTAMPILLA') {
                    $solicitudItem->cantidad = 2;
                }
                if(str_starts_with($item->nombre, 'Derecho ')) {
                    $solicitudItem->cantidad = 2;
                }
            }
            $solicitudItem->precio = $item->precio * $solicitudItem->cantidad;
            $solicitudItem->save();
        });
    }
}