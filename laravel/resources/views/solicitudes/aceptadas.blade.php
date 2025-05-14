@extends('components.layout')

@section('title', 'Solicitudes aceptadas')

@push('breadcrumb')
<li class="breadcrumb-item-govco"><a href="/home">Trámites</a></li>
<li class="breadcrumb-item-govco active" aria-current="page">Solicitudes aceptadas</li>
@endpush

@section('content')

<div class="admin-home mt-2" data-content="natural">
    <div class="row justify-content-between">
        <div class="col-lg-9">
            @include('components.success-alert')
            <h3 class="govcolor-blue-dark mb-4">Solicitudes aceptadas</h3>
            <div class="container-tabla">
                <table class="table table-general fix" aria-describedby="tableDescCursorRows">
                    <thead class="encabezado-tabla">
                        <tr>
                            <th width="1">Radicado</th>
                            <th width="1">Fecha<br />solicitud</th>
                            <th width="1">Fecha<br />aprobacion</th>
                            <th>Asunto</th>
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
                            <td><span class="max-w350">{{expandAbbreviation($solicitud->asunto)}}</span></td>
                            <!-- <td>{{$solicitud->usuario->nombre_completo}}</td>
                            <td>{{$solicitud->usuario->documento_completo}}</td> -->
                            <td><span class="etiqueta-govco {{$solicitud->recibo_pago ? 'completado' : 'pendiente'}}">{{$solicitud->recibo_pago ? $solicitud->recibo_pago->created_at->format('d/m/Y') : 'PENDIENTE'}}</span></td>
                            <td>
                                <div>
                                    <a class="govco-a" href="/" data-bs-toggle="modal" data-bs-target="#ver-mas"
                                        data-bs-radicado="{{$solicitud->radicado}}"
                                        data-bs-fechasolicitud="{{$solicitud->created_at->format('d/m/Y')}}"
                                        data-bs-estado="{{$solicitud->estado}}"
                                        data-bs-fecharespuesta="{{$solicitud->fecha_aprobacion ? $solicitud->fecha_aprobacion->format('d/m/Y') : 'PENDIENTE'}}"
                                        data-bs-reciboenviado="{{$solicitud->recibo_pago ? $solicitud->recibo_pago->created_at->format('d/m/Y') : 'PENDIENTE'}}"
                                        data-bs-asunto="{{expandAbbreviation($solicitud->asunto)}}"
                                        data-bs-nombres="{{$solicitud->usuario->nombre_completo}}"
                                        data-bs-numerodocumento="{{$solicitud->usuario->documento_completo}}"
                                        data-bs-correoelectronico="{{$solicitud->usuario->email}}"
                                        data-bs-comentario="{{$solicitud->comentario}}"
                                        data-bs-documentos="{{ json_encode($solicitud->documentos_usuario) }}">
                                        VER MÁS</a> /
                                    <a class="govco-a" href="/" data-bs-toggle="modal" data-bs-target="#enviar-recibo"
                                        data-bs-action="/solicitudes/{{$solicitud->id}}/mail-recibo-pago">
                                        {{$solicitud->recibo_pago ? 'RE' : ''}}ENVIAR RECIBO</a>
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
                                <p class="etiqueta-govco" style="width: fit-content;"></p>
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
                                                <input type="file" name="file_recibo" id="file_recibo" class="input-carga-de-archivo-govco active" data-error="0" data-action="uploadFile" data-action-delete="deleteFile" multiple />
                                                <label for="file_recibo" class="label-carga-de-archivo-govco">Etiqueta*</label>
                                                <label for="file_recibo" class="container-input-carga-de-archivo-govco">
                                                    <span class="button-file-carga-de-archivo-govco">Seleccionar archivo</span>
                                                    <span class="file-name-carga-de-archivo-govco">Sin archivo seleccionado</span>
                                                </label>
                                                <span class="text-validation-carga-de-archivo-govco">Cualquier tipo de archivo. Peso máximo: 2 MB</span>
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
            'numerodocumento', 'correoelectronico'
        ];
        vars.forEach((v, i) => {
            fields[i].innerHTML = trigger.getAttribute(`data-bs-${v}`);
        });

        // Remove existing classes before adding new ones
        fields[2].classList.remove('completado', 'error');
        fields[4].classList.remove('pendiente', 'completado');

        fields[2].classList.add(fields[2].innerHTML === "APROBADA" ? 'completado' : 'error');
        fields[4].classList.add(fields[4].innerHTML === "PENDIENTE" ? 'pendiente' : 'completado');

        const documentos = JSON.parse(trigger.getAttribute('data-bs-documentos'));
        renderDocumentosTable(documentos);
    })
    
    var inputFileFiles = [];
    var enviarRecibo = document.getElementById('enviar-recibo');
    enviarRecibo.addEventListener('show.bs.modal', function(event) {
        var trigger = event.relatedTarget;
        enviarRecibo.querySelector('.modal-dialog form').setAttribute('action', trigger.getAttribute('data-bs-action'));
    });
    var form = document.querySelector('.modal-dialog form');

    // File upload
    window.addEventListener("load", function() {
        setValidationParameters('file_recibo', ['pdf'], 2097152, 1);
    });

    form.querySelector('#file_recibo').addEventListener('change', function(event) {
        setTimeout(function(){
            document.querySelector('#file_recibo_load').click();
        }, 200);
    });

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        const dataTransfer = new DataTransfer();
        inputFileFiles.forEach(file => dataTransfer.items.add(file));
        const tempForm = cloneFileForm(form);
        var inputFile = document.createElement("input");
        inputFile.type = "file";
        inputFile.name = "file_recibo[]";
        inputFile.files = dataTransfer.files;
        tempForm.appendChild(inputFile);
        document.body.appendChild(tempForm);
        tempForm.submit();
    });

    form.addEventListener('change', function(){
        setTimeout(function(){}, 1000);
        validateFileForm(form, function(){
            form.querySelector('button[type="submit"]').removeAttribute('disabled');
        }, function(){
            form.querySelector('button[type="submit"]').setAttribute('disabled', 'disabled');
            inputFileFiles = [];
        })
    });

    function uploadFile(inputFiles) {
        return new Promise(function(resolve, reject) {
            if (true) {
                inputFileFiles = inputFiles;
                const filesLoadedSuccesfully = inputFiles;
                resolve(filesLoadedSuccesfully);
            } else {
                reject('Ocurrió un error al cargar los archivos.');
            }
        });
    }
    function _dibujarElementos(pages, page) {
        __dibujarElementos(pages, page, '/solicitudes/aceptadas');
    }
</script>

@endpush