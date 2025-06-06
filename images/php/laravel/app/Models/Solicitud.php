<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Documento;
use App\Models\Comentario;

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
        'email',
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
}