@extends('components.layout')

@section('title', 'Ver Solicitud')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/general/linea-avance2.css') }}">
@endpush

@push('breadcrumb')
<li class="breadcrumb-item-govco"><a href="/user/solicitudes">Mis Solicitudes</a></li>
<li class="breadcrumb-item-govco active" aria-current="page">{{ $solicitud->radicado }}</li>
@endpush

@section('content')

<div class="admin-home mt-2" data-content="natural">
    <div class="row justify-content-between">
        <div class="col-lg-8">
            <h3 class="govcolor-blue-dark mb-4">Ver Solicitud</h3>
            <div class="container-principal-linea-interaccion-govco">
                <div class="container-indicador-numero-principal-interaccion-govco justify-content-between">
                    <div id="indicadorcontainerinthrz1" class="container-indicador-numero-uno-interaccion-govco">
                        <button id="indicadorlineainthrz1" class="indicador-linea-avance-inactivo-interaccion-govco">
                            <a href="javascript:void(0)" id="numeroindicadorinthrz1" tabindex="-1"
                                class="num-indicador-inactivo-interaccion-govco">1</a>
                        </button>
                    </div>
                    <div id="indicadorcontainerinthrzlinea1" class="container-linea-avance-uno-interaccion-govco">
                        <div
                            class="linea-avance-interaccion-inactivada-govco linea-avance-interaccion-govco spacing-inactive-line">
                            <div class="progress">
                                <div id="lineavanceinthrz1" class="progress-bar-activa-interaccion-inactivada-govco"
                                    style="width:30%;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="indicadorcontainerinthrz2" class="container-indicador-numero-dos-interaccion-govco">
                        <button id="indicadorlineainthrz2" class="indicador-linea-avance-inactivo-interaccion-govco">
                            <a href="javascript:void(0)" id="numeroindicadorinthrz2" tabindex="-1"
                                class="num-indicador-inactivo-interaccion-govco">2</a>
                        </button>
                    </div>
                    <div id="indicadorcontainerinthrzlinea2" class="container-linea-avance-dos-interaccion-govco">
                        <div
                            class="linea-avance-interaccion-inactivada-govco linea-avance-interaccion-govco spacing-inactive-line">
                            <div class="progress">
                                <div id="lineavanceinthrz2" class="progress-bar-activa-interaccion-inactivada-govco"
                                    style="width:30%;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="indicadorcontainerinthrz3" class="container-indicador-numero-tres-interaccion-govco">
                        <button id="indicadorlineainthrz3" class="indicador-linea-avance-inactivo-interaccion-govco">
                            <a href="javascript:void(0)" id="numeroindicadorinthrz3" tabindex="-1"
                                class="num-indicador-inactivo-interaccion-govco">3</a>
                        </button>
                    </div>
                    <div id="indicadorcontainerinthrzlinea3" class="container-linea-avance-tres-interaccion-govco">
                        <div
                            class="linea-avance-interaccion-inactivada-govco linea-avance-interaccion-govco spacing-inactive-line">
                            <div class="progress">
                                <div id="lineavanceinthrz3" class="progress-bar-activa-interaccion-inactivada-govco"
                                    style="width:30%;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="indicadorcontainerinthrz4" class="container-indicador-numero-cuatro-interaccion-govco">
                        <button id="indicadorlineainthrz4" class="indicador-linea-avance-inactivo-interaccion-govco">
                            <a href="javascript:void(0)" id="numeroindicadorinthrz4" tabindex="-1"
                                class="num-indicador-inactivo-interaccion-govco">4</a>
                        </button>
                    </div>
                    <div id="indicadorcontainerinthrzlinea4" class="container-linea-avance-cuatro-interaccion-govco">
                        <div
                            class="linea-avance-interaccion-inactivada-govco linea-avance-interaccion-govco spacing-inactive-line">
                            <div class="progress">
                                <div id="lineavanceinthrz4" class="progress-bar-activa-interaccion-inactivada-govco"
                                    style="width:30%;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="indicadorcontainerinthrz5" class="container-indicador-numero-cinco-interaccion-govco">
                        <button id="indicadorlineainthrz5" class="indicador-linea-avance-inactivo-interaccion-govco">
                            <a href="javascript:void(0)" id="numeroindicadorinthrz5" tabindex="-1"
                                class="num-indicador-inactivo-interaccion-govco">5</a>
                        </button>
                    </div>
                </div>
                <div class="container-indicador-numero-principal-nombre-interaccion-govco">
                    <div id="letracontainerinthrz1" class="container-indicador-numero-uno-nombre-interaccion-govco">
                        <span id="letrainthrz1" class="letra-indicador-inactivo-interaccion">Generar Solicitud</span>
                    </div>
                    <div id="espacioTitulo1" class="linea-avance-interaccion-nombre-govco">
                    </div>
                    <div id="letracontainerinthrz2" class="container-indicador-numero-dos-nombre-interaccion-govco">
                        <span id="letrainthrz2" class="letra-indicador-inactivo-interaccion">Esperar Aprobación</span>
                    </div>
                    <div id="espacioTitulo2"
                        class="linea-avance-interaccion-nombre-govco linea-avance-interaccion-nombre-govco2">
                    </div>
                    <div id="letracontainerinthrz3" class="container-indicador-numero-tres-nombre-interaccion-govco">
                        <span id="letrainthrz3" class="letra-indicador-inactivo-interaccion">Enviar Pago</span>
                    </div>
                    <div id="espacioTitulo3"
                        class="linea-avance-interaccion-nombre-govco linea-avance-interaccion-nombre-govco3">
                    </div>
                    <div id="letracontainerinthrz4" class="container-indicador-numero-cuatro-nombre-interaccion-govco">
                        <span id="letrainthrz4" class="letra-indicador-inactivo-interaccion">Esperar Validación</span>
                    </div>
                    <div id="espacioTitulo4"
                        class="linea-avance-interaccion-nombre-govco linea-avance-interaccion-nombre-govco3">
                    </div>
                    <div id="letracontainerinthrz5" class="container-indicador-numero-cinco-nombre-interaccion-govco">
                        <span id="letrainthrz5" class="letra-indicador-inactivo-interaccion">Recibir Certificado</span>
                    </div>
                </div>
                <div id="contactohorizontaluno" class="m-0 container-informacion-principal-interaccion-govco">
                    <div id="contactohorizontal" class="container-informacion-principal-campos-interaccion-govco">
                        <div class="informacion-vertical-govco">
                            @if (session('success'))
                            <div class="container-alerta-govco">
                                <div class="alert alerta-govco alerta-success-govco asuccess" role="alert">
                                    <span class="alerta-icon-govco alerta-icon-notificacion-govco asuccess"></span>
                                    <p class="alerta-content-text">
                                        {{ session('success') }}
                                    </p>
                                </div>
                            </div>
                            <br />
                            @endif
                            <div class="contenido-etapa etapa-3">
                                <div class="titulo-informacion-govco mb-4">
                                    <label>Cargar Pago</label>
                                </div>
                                <form id="cargar-constancia-pago" action="/user/solicitudes/{{$solicitud->id}}/documento" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="tipo" value="CONSTANCIA DE PAGO">
                                    <input type="hidden" name="responsable" value="USER">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="container-carga-de-archivo-govco mb-4">
                                                <div class="loader-carga-de-archivo-govco">
                                                    <div class="all-input-carga-de-archivo-govco">
                                                        <input type="file" name="contancia_pago" id="contancia_pago" class="input-carga-de-archivo-govco active" data-error="0" data-action="uploadFileConstanciaPago" data-action-delete="deleteFileConstanciaPago" multiple />
                                                        <label for="contancia_pago" class="label-carga-de-archivo-govco">Soporte de pago*</label>
                                                        <label for="contancia_pago" class="container-input-carga-de-archivo-govco">
                                                            <span class="button-file-carga-de-archivo-govco">Seleccionar archivo</span>
                                                            <span class="file-name-carga-de-archivo-govco">Sin archivo seleccionado</span>
                                                        </label>
                                                        <span class="text-validation-carga-de-archivo-govco">Cualquier tipo de archivo. Peso máximo: 2 MB</span>
                                                    </div>
                                                    <div class="load-button-carga-de-archivo-govco" style="display: none;">
                                                        <div class="load-carga-de-archivo-govco">
                                                            <div class="spinner-indicador-de-carga-govco" style="width: 32px; height: 32px; border-width: 6px;" role="status">
                                                                <span class="visually-hidden">Cargando...</span>
                                                            </div>
                                                        </div>
                                                        <button class="button-loader-carga-de-archivo-govco" disabled style="display: none;">Cargar archivo</button>
                                                    </div>
                                                </div>
                                                <div class="container-detail-carga-de-archivo-govco">
                                                    <span class="alert-carga-de-archivo-govco visually-hidden"></span>
                                                    <div class="attached-files-carga-de-archivo-govco"></div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn-linea-activar-govco linea-link-label-govco">
                                                Continuar
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="contenido-etapa etapa-4">
                                <div class="titulo-informacion-govco mb-4">
                                    <div class="row">
                                        <div class="container-alerta-govco">
                                            <div class="alert alerta-govco anotificacion" role="alert">
                                                <span class="alerta-icon-govco alerta-icon-notificacion-govco anotificacion"></span>
                                                <p class="alerta-content-text">
                                                    El pago está siendo validado
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="contenido-etapa etapa-5">
                                <div class="titulo-informacion-govco mb-4">
                                    <div class="row">
                                        <div class="container-alerta-govco">
                                            <div class="alert alerta-govco alerta-success-govco asuccess" role="alert">
                                                <span class="alerta-icon-govco alerta-icon-notificacion-govco asuccess"></span>
                                                <p class="alerta-content-text">
                                                    El correo pronto será enviado al correo <strong>{{$solicitud->usuario->email}}</strong>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="contenido-etapa etapa-6">
                                <div class="titulo-informacion-govco mb-4">
                                    <div class="row">
                                        <div class="container-alerta-govco">
                                            <div class="alert alerta-govco alerta-success-govco asuccess" role="alert">
                                                <span class="alerta-icon-govco alerta-icon-notificacion-govco asuccess"></span>
                                                <p class="alerta-content-text">
                                                    Certificado enviado al correo <strong>{{$solicitud->usuario->email}}</strong> el día
                                                    <strong>{{$solicitud->certificado ? $solicitud->certificado->created_at->format('d/m/Y') : ''}}</strong>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="titulo-informacion-govco mb-4">
                                <label>Detalles de la Solicitud</label>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <span><strong>Radicado:</strong></span>
                                    <p>{{$solicitud->radicado}}</p>
                                </div>
                                <div class="col-lg-7">
                                    <span><strong>Estado:</strong></span>
                                    <p class="etiqueta-govco 
                                        @switch($solicitud->estado)
                                            @case('EN REVISION')
                                                pendiente
                                                @break
                                            @case('RECHAZADA')
                                                error
                                                @break
                                            @default
                                                completado
                                        @endswitch
                                        " style="width: fit-content;">
                                        {{$solicitud->estado}}
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <span><strong>Fecha Solicitud:</strong></span>
                                    <p>{{$solicitud->created_at->format('d/m/Y')}}</p>
                                </div>
                                <div class="col-lg-7">
                                    <span><strong>Fecha Aprobación:</strong></span>
                                    <p class="etiqueta-govco {{$solicitud->fecha_aprobacion ? 'completado' : 'pendiente'}}" style="width: fit-content;">
                                        {{$solicitud->fecha_aprobacion ? $solicitud->fecha_aprobacion->format('d/m/Y') : 'PENDIENTE'}}
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5 contenido-etapa etapa-4 etapa-5 etapa-6">
                                    <span><strong>Recibo enviado:</strong></span>
                                    <p class="etiqueta-govco {{$solicitud->recibo_pago ? 'completado' : 'pendiente'}}" style="width: fit-content;">
                                        {{$solicitud->recibo_pago ? $solicitud->recibo_pago->created_at->format('d/m/Y') : 'PENDIENTE'}}
                                    </p>
                                </div>
                                <div class="col-lg-7 contenido-etapa etapa-5 etapa-6">
                                    <span><strong>Pago validado:</strong></span>
                                    <p class="etiqueta-govco {{$solicitud->fecha_validacion ? 'completado' : 'pendiente'}}" style="width: fit-content;">
                                        {{$solicitud->fecha_validacion ? $solicitud->fecha_validacion->format('d/m/Y') : 'PENDIENTE'}}
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <span><strong>Asunto:</strong></span>
                                    <p>{{expandAbbreviation($solicitud->asunto)}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <span><strong>Nombres:</strong></span>
                                    <p>{{$solicitud->usuario->nombre_completo}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <span><strong>Número documento:</strong></span>
                                    <p>{{$solicitud->usuario->documento_completo}}</p>
                                </div>
                                <div class="col-lg-7">
                                    <span><strong>Correo electrónico:</strong></span>
                                    <p>{{$solicitud->usuario->email}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <span><strong>Comentarios:</strong></span>
                                    @if ($solicitud->comentarios && count($solicitud->comentarios) > 0)
                                        <ul style="max-height: 400px;overflow-y: auto;overflow-x: clip; ">
                                            @foreach ($solicitud->comentarios as $comentario)
                                                <li class="mt-2">
                                                    <strong>{{ $comentario->autor }}:</strong> {{ $comentario->comentario }}
                                                    <br>
                                                    <small>{{ $comentario->created_at->format('d/m/Y H:i') }}</small>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>No hay comentarios.</p>
                                    @endif
                                </div>
                            </div>
                            <!-- <pre>{{ var_export($solicitud, true) }}</pre> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            @include('components.area-servicio')
        </div>

    </div>
</div>
<style>
    .linea-avance-interaccion-nombre-govco {
        width: 7em;
    }

    .contenido-etapa {
        display: none;
    }

    .contenido-etapa.active {
        display: block;
    }

    .container-indicador-numero-principal-nombre-interaccion-govco {
        margin-left: 20px;
        text-align: center;
    }
</style>
@endsection
@push('scripts')
<script src="{{ asset('assets/general/linea-avance2.js') }}"></script>
<script src="{{ asset('assets/form/carga-de-archivo.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        var fileInputs = document.querySelectorAll('.input-carga-de-archivo-govco');
        fileInputs.forEach(function(fileInput) {
            fileInput.addEventListener('change', function() {
                timeOut = setTimeout(() => {
                    this.parentElement.parentElement.querySelector('.button-loader-carga-de-archivo-govco').click();
                }, 500);
            });
        });

        const estado = '{{ $solicitud->estado }}';
        let estadoNum = 1;

        switch (estado) {
            case 'EN REVISION':
                estadoNum = 2;
                break;
            case 'RECHAZADA':
                estadoNum = 2;
                break;
            case 'APROBADA':
                estadoNum = 3;
                break;
            case 'VALIDADA':
                estadoNum = 5;
                break;
        }

        if (estadoNum === 3 && '{{ $solicitud->constancia_pago ? 1 : 0 }}' === '1') {
            estadoNum = 4;
        }

        if (estadoNum === 5 && '{{ $solicitud->certificado ? 1 : 0 }}' === '1') {
            estadoNum = 6;
        }
        for (let i = 1; i <= estadoNum; i++) {
            if (i === 6) {
                break
            }
            setActivo(i)
            if (i < estadoNum) {
                setTerminado(i)
            }
        }
        document.querySelectorAll('.etapa-' + estadoNum).forEach(function(element) {
            element.classList.add('active');
        });
    });

    var fileConstanciaPago = [];

    var form = document.querySelector('#cargar-constancia-pago');
    form.addEventListener('change', preValidateFileForm.bind(this, form));

    function preValidateFileForm(form) {
        setTimeout(function() {
            validateFileForm(form, function() {
                form.querySelector('button[type="submit"]').removeAttribute('disabled');
            }, function() {
                form.querySelector('button[type="submit"]').setAttribute('disabled', 'disabled');
            })
        }, 200);
    }

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        const dataTransfer = new DataTransfer();
        const tempForm = cloneFileForm(form);
        tempForm.appendChild(addFileInputs(tempForm, fileConstanciaPago, "constancia_de_pago"));
        document.body.appendChild(tempForm);
        tempForm.submit();
    });

    function addFileInputs(tempform, inputFileFiles, inputName) {
        const dataTransfer = new DataTransfer();
        inputFileFiles.forEach(file => dataTransfer.items.add(file));
        var inputFile = document.createElement("input");
        inputFile.type = "file";
        inputFile.name = inputName;
        inputFile.files = dataTransfer.files;
        return inputFile;
    }

    function uploadFileConstanciaPago(inputFiles) {
        return new Promise(function(resolve, reject) {
            if (true) {
                fileConstanciaPago = inputFiles;
                const filesLoadedSuccesfully = inputFiles;
                resolve(filesLoadedSuccesfully);
            } else {
                reject('Ocurrió un error al cargar los archivos.');
            }
        });
    }

    function deleteFileConstanciaPago() {
        fileConstanciaPago = [];
        preValidateFileForm(form)
    }
</script>
@endpush