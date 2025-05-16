@extends('components.layout')

@section('title', 'Nueva Solicitud')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/general/linea-avance2.css') }}">
@endpush

@push('breadcrumb')
<li class="breadcrumb-item-govco active" aria-current="page">Nueva Solicitud</li>
@endpush

@section('content')

<div class="admin-home mt-2" data-content="natural">
    <div class="row justify-content-between">
        <div class="col-lg-8">
            <h3 class="govcolor-blue-dark mb-4">Nueva Solicitud de {{$tramite->nombre}}</h3>
            <div class="container-principal-linea-interaccion-govco">
                <div class="container-indicador-numero-principal-interaccion-govco">
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
                            @endif

                            <form id="nueva-solicitud" action="/solicitudes" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="tramite_id" value="{{$tramite->id}}">
                                <div class="modal-header modal-header-govco modal-header-alerts-govco">
                                    <button type="button" disabled class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body modal-body-govco" style="margin: 12px 40px !important">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="documento_identidad" class="label-carga-de-archivo-govco">Descargar y diligenciar archivo (FUN)</label>
                                            <a href="{{ asset('assets/FUN.xls') }}" download="B16-Ministerio-de-Transporte.xls" class="boton-descarga">
                                                <button type="button" class="btn-govco outline-btn-govco">Descargar Formulario Fun</button>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="entradas-de-texto-govco col-lg-12 px-2">
                                                <label for="nombres">Nombres completos *</label>
                                                <div class="container-input-texto-govco">
                                                    <input required type="text" name="nombres" id="nombres" aria-required="true" class="@error('nombres') error @enderror" value="{{ old('nombres') }}">
                                                    <div class="icon-entradas-de-texto-govco success-icon-entradas-de-texto-govco" aria-label="success" aria-hidden="true"></div>
                                                    <div class="icon-entradas-de-texto-govco error-icon-entradas-de-texto-govco" aria-label="error" aria-hidden="true"></div>
                                                </div>
                                                @error('nombres')
                                                <span class="error-texto-govco alert-entradas-de-texto-govco" role="alert" aria-live="assertive">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="entradas-de-texto-govco col-lg-12 px-2">
                                                <label for="tipo_documento" class="label-desplegable-govco">Tipo de documento<span aria-required="true">*</span></label>
                                                <div class="desplegable-govco @error('tipo_documento') error-desplegable-govco @enderror" id="lista-desplegables" data-type="basic">
                                                    <select required aria-invalid="false" aria-describedby="alert-id" name="tipo_documento" id="tipo_documento">
                                                        <option disabled selected>Escoger</option>
                                                        <option value="CC">Cédula de ciudadanía</option>
                                                        <option value="CE">Cédula de extranjería</option>
                                                        <option value="PA">Pasaporte</option>
                                                        <option value="RC">Registro civil</option>
                                                        <option value="TI">Tarjeta de identidad</option>
                                                    </select>
                                                </div>
                                                @error('tipo_documento')
                                                <span class="error-texto-govco alert-entradas-de-texto-govco" role="alert" aria-live="assertive">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="entradas-de-texto-govco col-lg-12 px-2">
                                                <label for="identificacion">identificacion*</label>
                                                <div class="container-input-texto-govco">
                                                    <input type="text" name="identificacion" id="identificacion" placeholder="Ejemplo: 1234567890" aria-required="true" class="@error('identificacion') error @enderror" value="{{ old('identificacion') }}">
                                                    <div class="icon-entradas-de-texto-govco success-icon-entradas-de-texto-govco" aria-label="success" aria-hidden="true"></div>
                                                    <div class="icon-entradas-de-texto-govco error-icon-entradas-de-texto-govco" aria-label="error" aria-hidden="true"></div>
                                                </div>
                                                @error('identificacion')
                                                <span class="error-texto-govco alert-entradas-de-texto-govco" role="alert" aria-live="assertive">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="entradas-de-texto-govco col-lg-12 px-2">
                                                <label for="email">Dirección de correo electrónico *</label>
                                                <div class="container-input-texto-govco">
                                                    <input required type="text" name="email" id="email" aria-required="true" class="@error('email') error @enderror" value="{{ old('email') }}">
                                                    <div class="icon-entradas-de-texto-govco success-icon-entradas-de-texto-govco" aria-label="success" aria-hidden="true"></div>
                                                    <div class="icon-entradas-de-texto-govco error-icon-entradas-de-texto-govco" aria-label="error" aria-hidden="true"></div>
                                                </div>
                                                @error('email')
                                                <span class="error-texto-govco alert-entradas-de-texto-govco" role="alert" aria-live="assertive">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12"></div>
                                            <div class="container-carga-de-archivo-govco mb-4">
                                                <div class="loader-carga-de-archivo-govco">
                                                    <div class="all-input-carga-de-archivo-govco">
                                                        <input required="required" type="file" name="documento_identidad" id="documento_identidad" class="input-carga-de-archivo-govco active" data-error="0" data-action="uploadFileDocumentoIdentidad" data-action-delete="deleteFileDocumentoIdentidad" multiple />
                                                        <label for="documento_identidad" class="label-carga-de-archivo-govco">Documento de identidad*</label>
                                                        <label for="documento_identidad" class="container-input-carga-de-archivo-govco">
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
                                                        <button id="documento_identidad_load" class="button-loader-carga-de-archivo-govco" disabled>Cargar archivo</button>
                                                    </div>
                                                </div>
                                                <div class="container-detail-carga-de-archivo-govco">
                                                    <span id="documento_identidad_error" class="alert-carga-de-archivo-govco visually-hidden"></span>
                                                    <div class="attached-files-carga-de-archivo-govco"></div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-lg-12">
                                            <div class="container-carga-de-archivo-govco mb-4">
                                                <div class="loader-carga-de-archivo-govco">
                                                    <div class="all-input-carga-de-archivo-govco">
                                                        <input required="required" type="file" name="documento_fun" id="documento_fun" class="input-carga-de-archivo-govco active" data-error="0" data-action="uploadFileDocumentoFun" data-action-delete="deleteFileDocumentoFun" multiple />
                                                        <label for="documento_fun" class="label-carga-de-archivo-govco">Documento FUN*</label>
                                                        <label for="documento_fun" class="container-input-carga-de-archivo-govco">
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
                                                        <button id="documento_fun_load" class="button-loader-carga-de-archivo-govco" disabled>Cargar archivo</button>
                                                    </div>
                                                </div>
                                                <div class="container-detail-carga-de-archivo-govco">
                                                    <span id="documento_fun_error" class="alert-carga-de-archivo-govco visually-hidden"></span>
                                                    <div class="attached-files-carga-de-archivo-govco"></div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-lg-12">
                                            <div class="container-carga-de-archivo-govco">
                                                <div class="loader-carga-de-archivo-govco">
                                                    <div class="all-input-carga-de-archivo-govco">
                                                        <input required="required" type="file" name="documento_propiedad" id="documento_propiedad" class="input-carga-de-archivo-govco active" data-error="0" data-action="uploadFileDocumentoPropiedad" data-action-delete="deleteFileDocumentoPropiedad" multiple />
                                                        <label for="documento_propiedad" class="label-carga-de-archivo-govco">Tarjeta de Propiedad*</label>
                                                        <label for="documento_propiedad" class="container-input-carga-de-archivo-govco">
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
                                                        <button id="documento_propiedad_load" class="button-loader-carga-de-archivo-govco" disabled>Cargar archivo</button>
                                                    </div>
                                                </div>
                                                <div class="container-detail-carga-de-archivo-govco">
                                                    <span id="documento_propiedad_error" class="alert-carga-de-archivo-govco visually-hidden"></span>
                                                    <div class="attached-files-carga-de-archivo-govco"></div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-lg-12 mt-4">
                                            <label for="check_adicional" class="form-label">
                                                <input type="checkbox" id="check_adicional" name="check_adicional" onclick="toggleArchivoAdicional()">
                                                ¿Esta realizando el tramite para una tercera persona?
                                            </label>
                                        </div>
                                        <div class="col-lg-12 d-none" id="archivo_adicional">
                                            <div class="container-carga-de-archivo-govco">
                                                <div class="loader-carga-de-archivo-govco">
                                                    <div class="all-input-carga-de-archivo-govco">
                                                        <input type="file" name="documento_poder" id="documento_poder" class="input-carga-de-archivo-govco active" data-error="0" data-action="uploadFilePoder" data-action-delete="deleteFilePoder" multiple />
                                                        <label for="documento_poder" class="label-carga-de-archivo-govco">Documento poder*</label>
                                                        <label for="documento_poder" class="container-input-carga-de-archivo-govco">
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
                                                        <button id="documento_poder_load" class="button-loader-carga-de-archivo-govco" disabled>Cargar archivo</button>
                                                    </div>
                                                </div>
                                                <div class="container-detail-carga-de-archivo-govco">
                                                    <span id="documento_poder_error" class="alert-carga-de-archivo-govco visually-hidden"></span>
                                                    <div class="attached-files-carga-de-archivo-govco"></div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-lg-12 mt-4">
                                            <button disabled type="submit" class="btn btn-primary btn-modal-govco fit-content">
                                                Continuar
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </form>
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
    #letrainthrz1 {
        margin-left: -28px;
    }

    #espacioTitulo1 {
        width: 7em;
    }

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
        margin-left: 40px;
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
                }, 100);
            });
        });
        setActivo(1);
    });

    var fileDocumentoIdentidad = [];
    var fileDocumentoFun = [];
    var fileDocumentoPropiedad = [];
    var filePoder = [];
    var form = document.querySelector('#nueva-solicitud');

    function toggleArchivoAdicional() {
        var archivoAdicional = document.getElementById('archivo_adicional');
        if (archivoAdicional.classList.contains('d-none')) {
            archivoAdicional.classList.remove('d-none');
            archivoAdicional.querySelector('input[type="file"]').setAttribute('required', 'required');
        } else {
            archivoAdicional.classList.add('d-none');
            archivoAdicional.querySelector('input[type="file"]').removeAttribute('required');
            archivoAdicional.querySelector('input[type="file"]').removeAttribute('data-error');
            filePoder = [];
        }
    }

    // File upload
    window.addEventListener("load", function() {
        setValidationParameters('documento_identidad', ['pdf'], 2097152, 1);
        setValidationParameters('documento_fun', ['xls'], 2097152, 1);
        setValidationParameters('documento_propiedad', ['pdf'], 2097152, 1);
        setValidationParameters('documento_poder', ['pdf'], 2097152, 1);
    });

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        const dataTransfer = new DataTransfer();
        const tempForm = cloneFileForm(form);
        tempForm.appendChild(addFileInputs(tempForm, fileDocumentoIdentidad, "id"));
        tempForm.appendChild(addFileInputs(tempForm, fileDocumentoFun, "fun"));
        tempForm.appendChild(addFileInputs(tempForm, fileDocumentoPropiedad, "propiedad"));
        tempForm.appendChild(addFileInputs(tempForm, filePoder, "poder"));
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

    function uploadFileDocumentoIdentidad(inputFiles) {
        return new Promise(function(resolve, reject) {
            if (true) {
                fileDocumentoIdentidad = inputFiles;
                const filesLoadedSuccesfully = inputFiles;
                resolve(filesLoadedSuccesfully);
            } else {
                reject('Ocurrió un error al cargar los archivos.');
            }
        });
    }

    function uploadFileDocumentoFun(inputFiles) {
        return new Promise(function(resolve, reject) {
            if (true) {
                fileDocumentoFun = inputFiles;
                const filesLoadedSuccesfully = inputFiles;
                resolve(filesLoadedSuccesfully);
            } else {
                reject('Ocurrió un error al cargar los archivos.');
            }
        });
    }

    function uploadFileDocumentoPropiedad(inputFiles) {
        return new Promise(function(resolve, reject) {
            if (true) {
                fileDocumentoPropiedad = inputFiles;
                const filesLoadedSuccesfully = inputFiles;
                resolve(filesLoadedSuccesfully);
            } else {
                reject('Ocurrió un error al cargar los archivos.');
            }
        });
    }

    function uploadFilePoder(inputFiles) {
        return new Promise(function(resolve, reject) {
            if (true) {
                filePoder = inputFiles;
                const filesLoadedSuccesfully = inputFiles;
                resolve(filesLoadedSuccesfully);
            } else {
                reject('Ocurrió un error al cargar los archivos.');
            }
        });
    }

    function deleteFileDocumentoIdentidad() {
        fileDocumentoIdentidad = [];
        preValidateFileForm(form)
    }

    function deleteFileDocumentoFun() {
        fileDocumentoFun = [];
        preValidateFileForm(form)
    }

    function deleteFileDocumentoPropiedad() {
        fileDocumentoPropiedad = [];
        preValidateFileForm(form)
    }

    function deleteFilePoder() {
        filePoder = [];
        preValidateFileForm(form)
    }
</script>
@endpush