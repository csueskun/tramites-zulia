@extends('components.layout')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/transversal/paginacion.css') }}">
@endpush

@section('title', 'Solicitudes pendientes')

@push('breadcrumb')
<li class="breadcrumb-item-govco"><a href="/home">Trámites</a></li>
<li class="breadcrumb-item-govco active" aria-current="page">Solicitudes pendientes</li>
@endpush

@section('content')

<div class="admin-home mt-2" data-content="natural">
    <div class="row justify-content-between">
        <div class="col-lg-9">
            @include('components.session-messages')
            <h1 class="mb-4">Solicitudes pendientes</h1>
            <x-table-options action="/solicitudes/pendientes"/> 
            <div class="container-tabla">
                <table class="table table-general fix tabla-govco actived-events-govcotabla-govco actived-events-govco" aria-describedby="tableDescCursorRows">
                    <thead class="encabezado-tabla">
                        <tr>
                            <th width="1">Radicado</th>
                            <th width="1">Fecha<br />Solicitud</th>
                            <th width="150">Asunto</th>
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
                                <div class="max-w200">
                                    <a class="govco-a" href="#" data-bs-toggle="modal" data-bs-target="#ver-mas"
                                        data-bs-radicado="{{$solicitud->radicado}}"
                                        data-bs-fechasolicitud="{{$solicitud->created_at->format('d/m/Y')}}"
                                        data-bs-asunto="{{$solicitud->tramite->nombre}}"
                                        data-bs-nombres="{{$solicitud->nombres}}"
                                        data-bs-numerodocumento="{{$solicitud->tipo_documento}} {{$solicitud->identificacion}}"
                                        data-bs-telefono="{{$solicitud->telefono}}"
                                        data-bs-correoelectronico="{{$solicitud->usuario->email}}"
                                        data-bs-documentos="{{ json_encode(array_values($solicitud->documentos_usuario->toArray())) }}"
                                        data-bs-comentarios="{{ json_encode($solicitud->comentarios) }}">
                                        VER MÁS</a> /
                                    <a class="govco-a comentarios-trigger" href="#" data-bs-toggle="modal" data-bs-target="#comentarios-modal"
                                        data-bs-id="{{$solicitud->id}}"
                                        data-bs-comentarios="{{ json_encode($solicitud->comentarios) }}">
                                        COMENTARIOS</a> /
                                    <a class="govco-a" href="/" data-bs-toggle="modal" data-bs-target="#aceptar-solicitud"
                                        data-bs-action="/solicitudes/{{$solicitud->id}}"
                                        data-bs-usuario-id="{{ $solicitud->id }}">
                                        ACEPTAR</a>
                                    </form> /
                                    <a class="govco-a" href="/" data-bs-toggle="modal" data-bs-target="#rechazar-modal"
                                        data-bs-action="/solicitudes/{{$solicitud->id}}"
                                        data-bs-usuario-id="{{ $solicitud->id }}">
                                        RECHAZAR</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @if ($solicitudes->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center">No se encontraron solicitudes.</td>
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
                        route="/solicitudes/pendientes" 
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
<div class="modal fade" id="rechazar-modal" role="dialog" aria-labelledby="rechazar-modal" aria-hidden="true">
    <div class="container-modal-govco" id="modal_rechazar">
        <div class="modal-container-govco" id="rechazarModalContainer" tabindex="-1" data-bs-backdrop="false"
            data-bs-keyboard="false" aria-labelledby="rechazar-modal" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-govco">
                <form action="" method="post">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="estado" value="RECHAZADA">
                    <div class="modal-content modal-content-govco">
                        <div class="modal-header modal-header-govco">
                        </div>
                        <div class="modal-body modal-body-govco">
                            <div class="modal-icon text-center">
                                <span class="govco-icon govco-info-circle"></span>
                            </div>
                            <h3 class="modal-title-govco mb-4 text-center">¿Está seguro de rechazar esta solicitud?</h3>
                            <p class="modal-text-govco text-center">Por favor, ingrese el motivo del rechazo:</p>
                            <div class="row my-4">
                                <textarea required class="aservice-comentarios-textarea" name="comentario"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer-govco">
                            <div class="modal-buttons-govco d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary btn-modal-govco">
                                    Rechazar
                                </button>
                                <button type="button" class="btn btn-primary btn-modal-govco btn-contorno" data-bs-dismiss="modal">
                                    Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="aceptar-solicitud" role="dialog" aria-labelledby="aceptar-solicitud" aria-hidden="true">
    <div class="container-modal-govco" id="modal_aceptar">
        <div class="modal-container-govco" id="aceptar-solicitud-modal" tabindex="-1" data-bs-backdrop="false"
            data-bs-keyboard="false" aria-labelledby="aceptar-solicitud" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-govco">
                <form action="" method="post">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="estado" value="APROBADA">
                    <div class="modal-content modal-content-govco">
                        <div class="modal-header modal-header-govco">
                        </div>
                        <div class="modal-body modal-body-govco">
                            <div class="modal-icon text-center">
                                <span class="govco-icon govco-info-circle"></span>
                            </div>
                            <h3 class="modal-title-govco mb-4 text-center">¿Está seguro de aceptar esta solicitud?</h3>
                            <p class="modal-text-govco text-center">Esta acción aprobará el trámite solicitado.</p>
                        </div>
                        <div class="modal-footer-govco">
                            <div class="modal-buttons-govco d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary btn-modal-govco">
                                    Aceptar
                                </button>
                                <button type="button" class="btn btn-primary btn-modal-govco btn-contorno" data-bs-dismiss="modal">
                                    Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
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
            'radicado', 'fechasolicitud', 'asunto', 'nombres',
            'numerodocumento', 'telefono', 'correoelectronico'
        ];
        vars.forEach((v, i) => {
            fields[i].innerHTML = trigger.getAttribute(`data-bs-${v}`);
        });
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
    document.getElementById('rechazar-modal').addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;
        var action = button.getAttribute('data-bs-action');
        var form = this.querySelector('#rechazar-modal form');
        form.action = action;
    });
    document.querySelector('#rechazar-modal form').addEventListener('submit', function(event) {
        document.getElementById('rechazar-modal').querySelector('.btn-close').click();
    });

    var aceptarSolicitud = document.getElementById('aceptar-solicitud');
    aceptarSolicitud.addEventListener('show.bs.modal', function(event) {
        var trigger = event.relatedTarget;
        aceptarSolicitud.querySelector('.modal-dialog form').setAttribute('action', trigger.getAttribute('data-bs-action'));
    });
</script>

@endpush