<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Documento;

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
        'comentario',
        'asunto',
        'fecha_aprobacion',
        'fecha_validacion',
    ];
    
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function documentos()
    {
        return $this->hasMany(Documento::class);
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