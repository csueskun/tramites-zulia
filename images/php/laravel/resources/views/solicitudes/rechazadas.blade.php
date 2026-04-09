@extends('components.layout')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/transversal/paginacion.css') }}">
@endpush

@section('title', 'Solicitudes rechazadas')

@push('breadcrumb')
<li class="breadcrumb-item-govco"><a href="/home">Trámites</a></li>
<li class="breadcrumb-item-govco active" aria-current="page">Solicitudes rechazadas</li>
@endpush

@section('content')

<div class="admin-home mt-2" data-content="natural">
    <div class="row justify-content-between">
        <div class="col-lg-9">
            @include('components.session-messages')
            <h1 class="mb-4">Solicitudes rechazadas</h1>
            <x-table-options action="/solicitudes/rechazadas"/> 
            <div class="container-tabla">
                <table class="table table-general fix tabla-govco actived-events-govcotabla-govco actived-events-govco" aria-describedby="tableDescCursorRows">
                    <thead class="encabezado-tabla">
                        <tr>
                            <th width="1">Radicado</th>
                            <th width="1">Fecha<br />Solicitud</th>
                            <th>Trámite</th>
                            <th>Nombres</th>
                            <th width="1">Número<br />documento</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="contenido-tablas contenido-hover">
                        @foreach ($solicitudes as $solicitud)
                        <tr>
                            <td>{{$solicitud->radicado}}</td>
                            <td>{{ $solicitud->created_at->format('d/m/Y') }}</td>
                            <td><span class="max-w350">{{$solicitud->tramite->nombre}}</span></td>
                            <td>{{$solicitud->usuario->nombre_completo}}</td>
                            <td>{{$solicitud->usuario->documento_completo}}</td>
                            <td>
                                <div>
                                    <a class="govco-a" href="/" data-bs-toggle="modal" data-bs-target="#ver-mas"
                                        data-bs-radicado="{{$solicitud->radicado}}"
                                        data-bs-fechasolicitud="{{$solicitud->created_at->format('d/m/Y')}}"
                                        data-bs-estado="{{$solicitud->estado}}"
                                        data-bs-fecharespuesta="{{$solicitud->fecha_aprobacion ? $solicitud->fecha_aprobacion->format('d/m/Y') : 'PENDIENTE'}}"
                                        data-bs-asunto="{{$solicitud->tramite->nombre}}"
                                        data-bs-nombres="{{$solicitud->nombres}}"
                                        data-bs-numerodocumento="{{$solicitud->tipo_documento}} {{$solicitud->identificacion}}"
                                        data-bs-telefono="{{$solicitud->telefono}}"
                                        data-bs-correoelectronico="{{$solicitud->usuario->email}}"
                                        data-bs-comentario="{{$solicitud->comentario}}"
                                        data-bs-constancia-pago="{{$solicitud->constancia_pago ? 1 : 0}}"
                                        data-bs-certificado="{{$solicitud->certificado ? 1 : 0}}"
                                        data-bs-documentos="{{ json_encode(array_values($solicitud->documentos_usuario->toArray())) }}">
                                        VER MÁS</a> /
                                    <a class="govco-a comentarios-trigger" href="#" data-bs-toggle="modal" data-bs-target="#comentarios-modal"
                                        data-bs-id="{{$solicitud->id}}"
                                        data-bs-comentarios="{{ json_encode($solicitud->comentarios) }}">
                                        COMENTARIOS</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @if ($solicitudes->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center">No se encontraron solicitudes.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>

            </div>
            <div class="pagination-container-govco">
                <nav class="nav-pagination-govco" aria-label="paginador de ejemplo">
                    <div 
                        class="pagination-govco" 
                        id="paginationExample" 
                        total="{{$solicitudes->lastPage()}}" 
                        filterby="{{request('filter_by') ?? ''}}" 
                        search="{{request('search') ?? ''}}"
                        perpage="{{$solicitudes->perPage()}}" 
                        route="/solicitudes/consolidadas" 
                        initialpage="{{$solicitudes->currentPage()}}">
                        <ul id="lista-paginador"></ul>
                    </div>
                </nav>
            </div>
        </div>

        <div class="col-lg-3">
            @include('components.area-servicio')
        </div>

    </div>
</div>

<div class="modal fade" id="ver-mas" role="dialog" aria-labelledby="ver-mas" aria-hidden="true">
    <div class="container-modal-govco" id="modal_ver_mas">
        <div class="modal-container-govco" id="verMasModalContainer" tabindex="-1" data-bs-backdrop="false"
            data-bs-keyboard="false" aria-labelledby="ver-mas" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-govco modal-lg">
                <div class="modal-content modal-content-govco">
                    <div class="modal-header modal-header-govco">
                        <a href="javascript:void(0)" role="button" data-bs-dismiss="modal" class="close-btn-modal"
                            aria-label="Close" aria-expanded="false" onclick="closeModal('modal_ver_mas')">
                            <span class="modal-close-govco govco-times"></span>
                        </a>
                    </div>
                    <div class="modal-body modal-body-govco">
                        <h3 class="modal-title-govco mb-4">Detalle de la solicitud</h3>
                        <div class="row">
                            <div class="col-lg-5">
                                <span class="modal-text-govco"><strong>Radicado:</strong></span>
                                <p class="modal-text-govco"></p>
                            </div>
                            <div class="col-lg-5">
                                <span class="modal-text-govco"><strong>Fecha Solicitud:</strong></span>
                                <p class="modal-text-govco"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <span class="modal-text-govco"><strong>Estado:</strong></span>
                                <p class="modal-text-govco"></p>
                            </div>
                            <div class="col-lg-5">
                                <span class="modal-text-govco"><strong>Fecha Aprobación:</strong></span>
                                <p class="modal-text-govco"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <span class="modal-text-govco"><strong>Asunto:</strong></span>
                                <p class="modal-text-govco"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <span class="modal-text-govco"><strong>Nombres:</strong></span>
                                <p class="modal-text-govco"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <span class="modal-text-govco"><strong>Número documento:</strong></span>
                                <p class="modal-text-govco"></p>
                            </div>
                            <div class="col-lg-7">
                                <span class="modal-text-govco"><strong>Teléfono:</strong></span>
                                <p class="modal-text-govco"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <span class="modal-text-govco"><strong>Correo Electrónico:</strong></span>
                                <p class="modal-text-govco"></p>
                            </div>
                        </div>
                        <div id="documentos-container">
                            <span class="modal-text-govco"><strong>Documentos:</strong></span>
                            <table id="documentos-table" class="table table-general fix" aria-describedby="tableDescCursorRows">
                                <tbody class="contenido-tablas contenido-hover">
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="modal-footer-govco">
                        <div class="modal-buttons-govco d-flex justify-content-center">
                            <button type="button" class="btn btn-primary btn-modal-govco btn-contorno" data-bs-dismiss="modal">
                                Cerrar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('components.admin-comentarios-modal')


@endsection
@push('scripts')
<script src="{{ asset('assets/paginacion/paginacion.js') }}"></script>
<script>
    var verMas = document.getElementById('ver-mas');
    verMas.addEventListener('show.bs.modal', function(event) {
        var trigger = event.relatedTarget;
        var fields = verMas.querySelectorAll('.modal-body p');

        const vars = [
            'radicado', 'fechasolicitud', 'estado', 'fecharespuesta', 'asunto', 'nombres',
            'numerodocumento', 'telefono', 'correoelectronico'
        ];
        vars.forEach((v, i) => {
            fields[i].innerHTML = trigger.getAttribute(`data-bs-${v}`);
        });
        const estadoField = fields[2];
        estadoField.innerHTML = printSolicitudEstado(
            trigger.getAttribute('data-bs-estado'),
            trigger.getAttribute('data-bs-certificado') === '1',
            trigger.getAttribute('data-bs-constancia-pago') === '1'
        );

        const documentos = JSON.parse(trigger.getAttribute('data-bs-documentos'));
        renderDocumentosTable(documentos);
    });
    var comentariosModal = document.getElementById('comentarios-modal');
    comentariosModal.addEventListener('show.bs.modal', function(event) {
        renderComentariosModal(event.relatedTarget, comentariosModal);
    });
    document.addEventListener('DOMContentLoaded', function() {
        const comentario = @json(session('triggerComentario'));
        if (comentario) {
            const trigger = document.querySelector(`[data-bs-id="${comentario}"]`);
            if (trigger) {
                trigger.click();
            }
        }
    });
</script>

@endpush