@extends('components.layout')

@section('title', 'Solicitudes pendientes')

@push('breadcrumb')
<li class="breadcrumb-item-govco"><a href="/home">Trámites</a></li>
<li class="breadcrumb-item-govco active" aria-current="page">Solicitudes pendientes</li>
@endpush

@section('content')

<div class="admin-home mt-2" data-content="natural">
    <div class="row justify-content-between">
        <div class="col-lg-9">
            @include('components.success-alert')
            <h3 class="govcolor-blue-dark mb-4">Solicitudes pendientes</h3>
            <div class="container-tabla">
                <table class="table table-general fix" aria-describedby="tableDescCursorRows">
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
                                        data-bs-nombres="{{$solicitud->usuario->nombre_completo}}"
                                        data-bs-numerodocumento="{{$solicitud->usuario->documento_completo}}"
                                        data-bs-correoelectronico="{{$solicitud->usuario->email}}"
                                        data-bs-documentos="{{ json_encode(array_values($solicitud->documentos_usuario->toArray())) }}"
                                        data-bs-comentarios="{{ json_encode($solicitud->comentarios) }}">
                                        VER MÁS</a> /
                                    <a class="govco-a comentarios-trigger" href="#" data-bs-toggle="modal" data-bs-target="#comentarios-modal"
                                        data-bs-id="{{$solicitud->id}}"
                                        data-bs-comentarios="{{ json_encode($solicitud->comentarios) }}">
                                        COMENTARIOS</a> /
                                    <form class="aceptar-solicitud d-inline" action="/solicitudes/{{$solicitud->id}}" method="post">
                                        @csrf
                                        @method('patch')
                                        <input type="hidden" name="id" value="{{$solicitud->id}}">
                                        <input type="hidden" name="estado" value="APROBADA">
                                        <input type="hidden" name="fecha_aprobacion" value="">
                                        <button type="submit" class="btn-to-govco-a govco-a">ACEPTAR</button>
                                    </form> /
                                    <form class="rechazar-solicitud d-inline" action="/solicitudes/{{$solicitud->id}}" method="post">
                                        @csrf
                                        @method('patch')
                                        <input type="hidden" name="id" value="{{$solicitud->id}}">
                                        <input type="hidden" name="estado" value="RECHAZADA">
                                        <button type="submit" class="btn-to-govco-a govco-a">RECHAZAR</button>
                                    </form>
                                    &nbsp;
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <div class="pagination-container-govco">
                <nav class="nav-pagination-govco" aria-label="paginador de ejemplo">
                    <div class="pagination-govco" id="paginationExample" total="{{$solicitudes->lastPage()}}" initialpage="{{$solicitudes->currentPage()}}">
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

<div class="modal fade" id="ver-mas" role="dialog" aria-labelledby="mdWarningLabel" aria-hidden="true">
    <div class="container-modal-govco" id="modal_warning">
        <div class="modal-container-govco" id="exampleModalWarning" tabindex="-1" data-bs-backdrop="false"
            data-bs-keyboard="false" aria-labelledby="exampleModalAdvertencia" aria-hidden="true" aria-hidden="true"
            role="dialog">
            <div class="modal-dialog modal-dialog-govco">
                <div class="modal-content modal-content-govco">
                    <div class="modal-header modal-header-govco modal-header-alerts-govco">
                        <button type="button" disabled class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body modal-body-govco" style="margin: 12px 40px !important">
                        <div class="row">
                            <div class="col-lg-5">
                                <span><strong>Radicado:</strong></span>
                                <p></p>
                            </div>
                            <div class="col-lg-5">
                                <span><strong>Fecha Solicitud:</strong></span>
                                <p></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <span><strong>Asunto:</strong></span>
                                <p></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <span><strong>Nombres:</strong></span>
                                <p></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <span><strong>Número documento:</strong></span>
                                <p></p>
                            </div>
                            <div class="col-lg-7">
                                <span><strong>Correo electrónico:</strong></span>
                                <p></p>
                            </div>
                        </div>
                        <div id="documentos-container">
                            <span><strong>Documentos:</strong></span>
                            <table id="documentos-table" class="table table-general fix" aria-describedby="tableDescCursorRows">
                                <tbody class="contenido-tablas contenido-hover">
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="modal-footer-govco modal-footer-alerts-govco">
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
            'radicado', 'fechasolicitud', 'asunto', 'nombres',
            'numerodocumento', 'correoelectronico'
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
    var forms = document.querySelectorAll('form.aceptar-solicitud');
    forms.forEach(function(form) {
        form.addEventListener('submit', function(event) {
            var fechaRespuestaInput = form.querySelector('input[name="fecha_aprobacion"]');
            fechaRespuestaInput.value = new Date().toISOString();
        });
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
    function _dibujarElementos(pages, page) {
        __dibujarElementos(pages, page, '/solicitudes/pendientes');
    }
</script>

@endpush