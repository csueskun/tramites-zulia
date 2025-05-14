@extends('components.layout')

@section('title', 'Solicitudes consolidadas')

@push('breadcrumb')
<li class="breadcrumb-item-govco"><a href="/home">Trámites</a></li>
<li class="breadcrumb-item-govco active" aria-current="page">Solicitudes consolidadas</li>
@endpush

@section('content')

<div class="admin-home mt-2" data-content="natural">
    <div class="row justify-content-between">
        <div class="col-lg-9">
            @include('components.success-alert')
            <h3 class="govcolor-blue-dark mb-4">Solicitudes consolidadas</h3>
            <div class="container-tabla">
                <table class="table table-general fix" aria-describedby="tableDescCursorRows">
                    <thead class="encabezado-tabla">
                        <tr>
                            <th width="1">Radicado</th>
                            <th width="1">Estado</th>
                            <th width="1">Fecha<br />Solicitud</th>
                            <th>Asunto</th>
                            <th>Nombres</th>
                            <th width="1">Número<br />documento</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="contenido-tablas contenido-hover">
                        @foreach ($solicitudes as $solicitud)
                        <tr>
                            <td>{{$solicitud->radicado}}</td>
                            <td><span class="etiqueta-govco {{$solicitud->estado == 'APROBADA' ? 'completado' : 'error'}}">{{$solicitud->estado}}</span></td>
                            <td>{{ $solicitud->created_at->format('d/m/Y') }}</td>
                            <td><span class="max-w350">{{expandAbbreviation($solicitud->asunto)}}</span></td>
                            <td>{{$solicitud->usuario->nombre_completo}}</td>
                            <td>{{$solicitud->usuario->documento_completo}}</td>
                            <td>
                                <div>
                                    <a class="govco-a" href="/" data-bs-toggle="modal" data-bs-target="#ver-mas"
                                        data-bs-radicado="{{$solicitud->radicado}}"
                                        data-bs-fechasolicitud="{{$solicitud->created_at->format('d/m/Y')}}"
                                        data-bs-estado="{{$solicitud->estado}}"
                                        data-bs-fecharespuesta="{{$solicitud->fecha_aprobacion ? $solicitud->fecha_aprobacion->format('d/m/Y') : 'PENDIENTE'}}"
                                        data-bs-asunto="{{expandAbbreviation($solicitud->asunto)}}"
                                        data-bs-nombres="{{$solicitud->usuario->nombre_completo}}"
                                        data-bs-numerodocumento="{{$solicitud->usuario->documento_completo}}"
                                        data-bs-correoelectronico="{{$solicitud->usuario->email}}"
                                        data-bs-comentario="{{$solicitud->comentario}}"
                                        data-bs-documentos="{{ json_encode(array_values($solicitud->documentos_usuario->toArray())) }}">
                                        VER MÁS</a>
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
                            <div class="col-lg-5">
                                <span><strong>Estado:</strong></span>
                                <p style="width: fit-content;"></p>
                            </div>
                            <div class="col-lg-5">
                                <span><strong>Fecha Aprobación:</strong></span>
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
            'numerodocumento', 'correoelectronico'
        ];
        vars.forEach((v, i) => {
            fields[i].innerHTML = trigger.getAttribute(`data-bs-${v}`);
        });
        const estadoField = fields[2];
        estadoField.classList.add('etiqueta-govco', estadoField.innerHTML === "APROBADA" ? 'completado' : 'error');

        const documentos = JSON.parse(trigger.getAttribute('data-bs-documentos'));
        renderDocumentosTable(documentos);
    });
    function _dibujarElementos(pages, page) {
        __dibujarElementos(pages, page, '/solicitudes/consolidadas');
    }
</script>

@endpush