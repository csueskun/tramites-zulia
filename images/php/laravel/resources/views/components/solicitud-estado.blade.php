@php
$className = 'pendiente';
$estadoLabel = $solicitud->estado;
switch ($estadoLabel) {
    case 'EN REVISION':
        $estadoLabel = 'EN REVISIÓN';
        break;
    case 'COMPLETADA':
        $className = 'completado';
        break;
    case 'RECHAZADA':
        $className = 'error';
        break;
    default:
        $className = 'pendiente';
        break;
}

if($estadoLabel === 'APROBADA' && $solicitud->constancia_pago) {
    $estadoLabel = 'EN VALIDACIÓN';
}

@endphp
<span class="estado-pendiente etiqueta-govco {{$className}}"
    data-estado="{{$solicitud->estado}}"
    data-constancia-pago="{{$solicitud->constancia_pago ? 1 : 0}}"
    data-certificado="{{$solicitud->certificado ? 1 : 0}}">
    <span>{{$estadoLabel}}</span>
</span>