@extends('components.layout')

@section('title', 'Enviar recibo de pago')

@push('breadcrumb')
<li class="breadcrumb-item-govco"><a href="/home">Trámites</a></li>
<li class="breadcrumb-item-govco active" aria-current="page">Enviar recibo de pago</li>
@endpush

@section('content')

<div class="admin-home mt-2" data-content="natural">
    <div class="row justify-content-between">
        <div class="col-lg-9">
            @include('components.session-messages')
            <h3 class="govcolor-blue-dark mb-4">Enviar recibo de pago</h3>
            <x-table-options action="/solicitudes/aceptadas"/> 
            <div class="container-tabla">
                <table class="table table-general fix" aria-describedby="tableDescCursorRows">
                    <thead class="encabezado-tabla">
                        <tr>
                            <th width="1">Radicado</th>
                            <th width="1">Fecha<br />solicitud</th>
                            <th width="1">Fecha<br />aprobacion</th>
                            <th>Trámite</th>
                            <!-- <th>Nombres</th>
                            <th width="1">Número<br />documento</th> -->
                            <th width="1">Recibo<br />enviado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="contenido-tablas contenido-hover">
                        @foreach ($solicitudes as $solicitud)
                        <tr>
                            <td>{{$solicitud->radicado}}</td>
                            <td>{{ $solicitud->created_at->format('d/m/Y') }}</td>
                            <td>{{ $solicitud->fecha_aprobacion->format('d/m/Y') }}</td>
                            <td><span class="max-w350">{{$solicitud->tramite->nombre}}</span></td>
                            <td>
                                @php
                                $recibo_vencido = $solicitud->recibo_pago && $solicitud->recibo_pago->created_at->format('Ymd') < now()->format('Ymd');
                                @endphp
                                @if($solicitud->recibo_pago)
                                @if($recibo_vencido)
                                <span class="etiqueta-govco error">VENCIDO</span>
                                @else
                                <span class="etiqueta-govco completado">{{$solicitud->recibo_pago->created_at->format('d/m/Y')}}</span>
                                @endif
                                @else
                                <span class="etiqueta-govco pendiente">PENDIENTE</span>
                                @endif
                            </td>
                            <td>
                                <div>
                                    <a class="govco-a" href="/" data-bs-toggle="modal" data-bs-target="#ver-mas"
                                        data-bs-radicado="{{$solicitud->radicado}}"
                                        data-bs-fechasolicitud="{{$solicitud->created_at->format('d/m/Y')}}"
                                        data-bs-estado="{{$solicitud->estado}}"
                                        data-bs-fecharespuesta="{{$solicitud->fecha_aprobacion ? $solicitud->fecha_aprobacion->format('d/m/Y') : 'PENDIENTE'}}"
                                        data-bs-reciboenviado="{{$solicitud->recibo_pago ? $solicitud->recibo_pago->created_at->format('d/m/Y') : 'PENDIENTE'}}"
                                        data-bs-asunto="{{$solicitud->tramite->nombre}}"
                                        data-bs-nombres="{{$solicitud->nombres}}"
                                        data-bs-numerodocumento="{{$solicitud->tipo_documento}} {{$solicitud->identificacion}}"
                                        data-bs-telefono="{{$solicitud->telefono}}"
                                        data-bs-correoelectronico="{{$solicitud->email}}"
                                        data-bs-comentario="{{$solicitud->comentario}}"
                                        data-bs-constancia-pago="{{$solicitud->constancia_pago ? 1 : 0}}"
                                        data-bs-certificado="{{$solicitud->certificado ? 1 : 0}}"
                                        data-bs-documentos="{{ json_encode($solicitud->documentos_usuario) }}">
                                        VER MÁS</a> /
                                    <a class="govco-a" href="https://portal-gov.tns.co/" target="_blank" >ABRIR PORTAL TNS</a> 
                                    @if ($solicitud->recibo_pago == null)
                                    @if ($solicitud->tramite_id == 3)
                                    / <form class="aceptar-solicitud d-inline" action="/solicitudes/{{$solicitud->id}}/mail-recibo-pago" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$solicitud->id}}">
                                        <input type="hidden" name="responsable" value="TNS">
                                        <button type="submit" class="btn-to-govco-a govco-a">RECIBO ENVIADO POR TNS</button>
                                    </form>
                                    @else
                                    / <a class="govco-a" href="/" data-bs-toggle="modal" data-bs-target="#enviar-cupl"
                                        data-bs-action="/solicitudes/{{$solicitud->id}}/mail-cupl">
                                        RECIBO ENVIADO POR TNS</a>
                                    @endif
                                    @endif
                                    @if ($recibo_vencido) 
                                    / <a class="govco-a" href="/" data-bs-toggle="modal" data-bs-target="#rechazar-modal"
                                        data-bs-action="/solicitudes/{{$solicitud->id}}"
                                        data-bs-usuario-id="{{ $solicitud->id }}">
                                        RECHAZAR</a>
                                    @endif
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
                        route="/solicitudes/aceptadas" 
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
                                <p></p>
                            </div>
                            <div class="col-lg-5">
                                <span><strong>Fecha Aprobación:</strong></span>
                                <p></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <span><strong>Recibo enviado:</strong></span>
                                <p class="etiqueta-govco" style="width: fit-content;"></p>
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
                                <span><strong>Teléfono:</strong></span>
                                <p></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <span><strong>Correo Electrónico:</strong></span>
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

<div class="modal fade" id="enviar-recibo" role="dialog" aria-labelledby="mdWarningLabel" aria-hidden="true">
    <div class="container-modal-govco" id="modal_warning">
        <div class="modal-container-govco" id="exampleModalWarning" tabindex="-1" data-bs-backdrop="false"
            data-bs-keyboard="false" aria-labelledby="exampleModalAdvertencia" aria-hidden="true" aria-hidden="true"
            role="dialog">
            <div class="modal-dialog modal-dialog-govco">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content modal-content-govco">
                        <div class="modal-header modal-header-govco modal-header-alerts-govco">
                            <button type="button" disabled class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body modal-body-govco" style="margin: 12px 40px !important">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="container-carga-de-archivo-govco">
                                        <div class="loader-carga-de-archivo-govco">
                                            <div class="all-input-carga-de-archivo-govco">
                                                <input type="file" name="file_recibo" id="file_recibo" class="input-carga-de-archivo-govco active" data-error="0" data-action="uploadReciboFile" data-action-delete="deleteReciboFile" multiple />
                                                <label for="file_recibo" class="label-carga-de-archivo-govco">Recibo de pago*</label>
                                                <label for="file_recibo" class="container-input-carga-de-archivo-govco">
                                                    <span class="button-file-carga-de-archivo-govco">Seleccionar archivo</span>
                                                    <span class="file-name-carga-de-archivo-govco">Sin archivo seleccionado</span>
                                                </label>
                                                <span class="text-validation-carga-de-archivo-govco">Tipo de archivo: <strong>.pdf</strong>. Peso máximo: 10 MB</span>
                                            </div>
                                            <div class="load-button-carga-de-archivo-govco" style="display: none;">
                                                <div class="load-carga-de-archivo-govco">
                                                    <!-- indicador de carga -->
                                                    <div class="spinner-indicador-de-carga-govco" style="width: 32px; height: 32px; border-width: 6px;" role="status">
                                                        <span class="visually-hidden">Cargando...</span>
                                                    </div>
                                                    <!-- end indicador de carga -->
                                                </div>
                                                <button id="file_recibo_load" disabled class="button-loader-carga-de-archivo-govco">Cargar archivo</button>
                                            </div>
                                        </div>

                                        <div class="container-detail-carga-de-archivo-govco">
                                            <span class="alert-carga-de-archivo-govco visually-hidden"></span>
                                            <div class="attached-files-carga-de-archivo-govco"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="entradas-de-texto-govco col-lg-12 px-2">
                                    <label for="link_pago">Link de pago</label>
                                    <div class="container-input-texto-govco">
                                        <input type="text" name="link_pago" id="link_pago" placeholder="https://oficinavirtual.tns.co/RecPago/Accesar?">
                                        <div class="icon-entradas-de-texto-govco success-icon-entradas-de-texto-govco" aria-label="success" aria-hidden="true"></div>
                                        <div class="icon-entradas-de-texto-govco error-icon-entradas-de-texto-govco" aria-label="error" aria-hidden="true"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer-govco modal-footer-alerts-govco">
                            <div class="modal-buttons-govco d-flex justify-space-between">
                                <button type="submit" disabled="disabled" class="btn btn-primary btn-modal-govco" data-bs-dismiss="modal">
                                    Enviar
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


<div class="modal fade" id="rechazar-modal" role="dialog" aria-labelledby="mdWarningLabel" aria-hidden="true">
    <div class="container-modal-govco">
        <div class="modal-container-govco" id="exampleModalWarning" tabindex="-1" data-bs-backdrop="false"
            data-bs-keyboard="false" aria-labelledby="exampleModalAdvertencia" aria-hidden="true" aria-hidden="true"
            role="dialog">
            <div class="modal-dialog modal-dialog-govco">
                <form action="" method="post">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="estado" value="RECHAZADA">
                    <div class="modal-content modal-content-govco">
                        <div class="modal-header modal-header-govco modal-header-alerts-govco">
                            <button type="button" disabled class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body modal-body-govco" style="margin: 12px 40px !important">
                            <div class="modal-icon center-elements-govco">
                                <span class="modal-icon-govco modal-warning-icon"></span>
                            </div>
                            <p class="modal-title modal-title-govco text-center">
                                ¿Está seguro de rechazar esta solicitud?
                            </p>
                            <p class="text-center">Por favor escriba el motivo del rechazo de la solicitud.</p>
                            <div class="row mt-2">
                                <textarea required class="aservice-comentarios-textarea" name="comentario"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer-govco modal-footer-alerts-govco">
                            <div class="modal-buttons-govco d-flex justify-space-between">
                                <button type="submit" class="btn btn-primary btn-modal-govco auto-width">
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

<div class="modal fade" id="enviar-cupl" role="dialog" aria-labelledby="mdWarningLabel" aria-hidden="true">
    <div class="container-modal-govco">
        <div class="modal-container-govco" id="exampleModalWarning" tabindex="-1" data-bs-backdrop="false"
            data-bs-keyboard="false" aria-labelledby="enviar-cupl" aria-hidden="true" aria-hidden="true"
            role="dialog">
            <div class="modal-dialog modal-dialog-govco">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content modal-content-govco">
                        <div class="modal-header modal-header-govco modal-header-alerts-govco">
                            <button type="button" disabled class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body modal-body-govco" style="margin: 12px 40px !important">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="container-carga-de-archivo-govco">
                                        <div class="loader-carga-de-archivo-govco">
                                            <div class="all-input-carga-de-archivo-govco">
                                                <input type="file" name="file_cupl" id="file_cupl" class="input-carga-de-archivo-govco active" data-error="0" data-action="uploadCuplFile" data-action-delete="deleteCuplFile" multiple />
                                                <label for="file_cupl" class="label-carga-de-archivo-govco">Anexar CUPL</label>
                                                <label for="file_cupl" class="container-input-carga-de-archivo-govco">
                                                    <span class="button-file-carga-de-archivo-govco">Seleccionar archivo</span>
                                                    <span class="file-name-carga-de-archivo-govco">Sin archivo seleccionado</span>
                                                </label>
                                                <span class="text-validation-carga-de-archivo-govco">Tipo de archivo: <strong>.pdf</strong>. Peso máximo: 10 MB</span>
                                            </div>
                                            <div class="load-button-carga-de-archivo-govco" style="display: none;">
                                                <div class="load-carga-de-archivo-govco">
                                                    <!-- indicador de carga -->
                                                    <div class="spinner-indicador-de-carga-govco" style="width: 32px; height: 32px; border-width: 6px;" role="status">
                                                        <span class="visually-hidden">Cargando...</span>
                                                    </div>
                                                    <!-- end indicador de carga -->
                                                </div>
                                                <button id="file_cupl_load" disabled class="button-loader-carga-de-archivo-govco">Cargar archivo</button>
                                            </div>
                                        </div>

                                        <div class="container-detail-carga-de-archivo-govco">
                                            <span class="alert-carga-de-archivo-govco visually-hidden"></span>
                                            <div class="attached-files-carga-de-archivo-govco"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer-govco modal-footer-alerts-govco">
                            <div class="modal-buttons-govco d-flex justify-space-between">
                                <button type="submit" disabled="disabled" class="btn btn-primary btn-modal-govco" data-bs-dismiss="modal">
                                    Enviar
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

@endsection
@push('scripts')
<script src="{{ asset('assets/paginacion/paginacion.js') }}"></script>
<script src="{{ asset('assets/form/carga-de-archivo.js') }}"></script>
<script>
    var verMas = document.getElementById('ver-mas');
    verMas.addEventListener('show.bs.modal', function(event) {
        var trigger = event.relatedTarget;
        var fields = verMas.querySelectorAll('.modal-body p');

        const vars = [
            'radicado', 'fechasolicitud', 'estado', 'fecharespuesta', 'reciboenviado', 'asunto', 'nombres',
            'numerodocumento', 'telefono', 'correoelectronico'
        ];
        vars.forEach((v, i) => {
            fields[i].innerHTML = trigger.getAttribute(`data-bs-${v}`);
        });

        // Remove existing classes before adding new ones
        fields[2].classList.remove('completado', 'error');
        fields[4].classList.remove('pendiente', 'completado');

        const estadoField = fields[2];
        estadoField.innerHTML = printSolicitudEstado(
            trigger.getAttribute('data-bs-estado'),
            trigger.getAttribute('data-bs-certificado') === '1',
            trigger.getAttribute('data-bs-constancia-pago') === '1'
        );

        fields[4].classList.add(fields[4].innerHTML === "PENDIENTE" ? 'pendiente' : 'completado');

        const documentos = JSON.parse(trigger.getAttribute('data-bs-documentos'));
        renderDocumentosTable(documentos);
    })
    
    var inputReciboFiles = [];
    var inputCuplFiles = [];
    var enviarRecibo = document.getElementById('enviar-recibo');
    enviarRecibo.addEventListener('show.bs.modal', function(event) {
        var trigger = event.relatedTarget;
        enviarRecibo.querySelector('.modal-dialog form').setAttribute('action', trigger.getAttribute('data-bs-action'));
    });
    var enviarCupl = document.getElementById('enviar-cupl');
    enviarCupl.addEventListener('show.bs.modal', function(event) {
        var trigger = event.relatedTarget;
        enviarCupl.querySelector('.modal-dialog form').setAttribute('action', trigger.getAttribute('data-bs-action'));
    });
    var formRecibo = document.querySelector('#enviar-recibo form');
    var formCupl = document.querySelector('#enviar-cupl form');

    // File upload
    window.addEventListener("load", function() {
        setValidationParameters('file_recibo', ['pdf'], 10485760, 1);
        setValidationParameters('file_cupl', ['pdf'], 10485760, 1);
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

    formRecibo.querySelector('#file_recibo').addEventListener('change', function(event) {
        setTimeout(function(){
            document.querySelector('#file_recibo_load').click();
        }, 200);
    });
    formCupl.querySelector('#file_cupl').addEventListener('change', function(event) {
        setTimeout(function(){
            document.querySelector('#file_cupl_load').click();
        }, 200);
    });

    formRecibo.addEventListener('submit', function(event) {
        event.preventDefault();
        const dataTransfer = new DataTransfer();
        inputReciboFiles.forEach(file => dataTransfer.items.add(file));
        const tempForm = cloneFileForm(formRecibo);
        var inputFile = document.createElement("input");
        inputFile.type = "file";
        inputFile.name = "file_recibo[]";
        inputFile.files = dataTransfer.files;
        tempForm.appendChild(inputFile);
        var linkPago = document.createElement("input");
        linkPago.name = "link_pago";
        linkPago.value = formRecibo.querySelector('#link_pago').value;
        tempForm.appendChild(linkPago);
        document.body.appendChild(tempForm);
        tempForm.submit();
    });

    formCupl.addEventListener('submit', function(event) {
        event.preventDefault();
        const dataTransfer = new DataTransfer();
        inputCuplFiles.forEach(file => dataTransfer.items.add(file));
        const tempForm = cloneFileForm(formCupl);
        var inputFile = document.createElement("input");
        inputFile.type = "file";
        inputFile.name = "file_cupl[]";
        inputFile.files = dataTransfer.files;
        tempForm.appendChild(inputFile);
        document.body.appendChild(tempForm);
        tempForm.submit();
    });

    formRecibo.addEventListener('change', function(){
        setTimeout(function(){}, 1000);
        validateFileForm(formRecibo, function(){
            formRecibo.querySelector('button[type="submit"]').removeAttribute('disabled');
        }, function(){
            formRecibo.querySelector('button[type="submit"]').setAttribute('disabled', 'disabled');
            inputReciboFiles = [];
        })
    });

    formCupl.addEventListener('change', function(){
        setTimeout(function(){}, 1000);
        validateFileForm(formCupl, function(){
            formCupl.querySelector('button[type="submit"]').removeAttribute('disabled');
        }, function(){
            formCupl.querySelector('button[type="submit"]').setAttribute('disabled', 'disabled');
            inputCuplFiles = [];
        })
    });

    function uploadReciboFile(inputFiles) {
        return new Promise(function(resolve, reject) {
            if (true) {
                inputReciboFiles = inputFiles;
                const filesLoadedSuccesfully = inputFiles;
                resolve(filesLoadedSuccesfully);
            } else {
                reject('Ocurrió un error al cargar los archivos.');
            }
        });
    }

    function uploadCuplFile(inputFiles) {
        return new Promise(function(resolve, reject) {
            if (true) {
                inputCuplFiles = inputFiles;
                const filesLoadedSuccesfully = inputFiles;
                resolve(filesLoadedSuccesfully);
            } else {
                reject('Ocurrió un error al cargar los archivos.');
            }
        });
    }
</script>

@endpush