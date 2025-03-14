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
            <h3 class="govcolor-blue-dark mb-4">Nueva Solicitud de {{expandAbbreviation($asunto)}}</h3>
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
                        <!-- <div class="titulo-informacion-govco">
                            <label>Nueva Solicitud de {{expandAbbreviation($asunto)}}</label>
                        </div> -->
                        <div class="informacion-vertical-govco">
                            <form action="/solicitudes" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="asunto" value="{{$asunto}}">
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
                                    <div class="row mt-4">
                                        <div class="col-lg-12">
                                            <div class="container-carga-de-archivo-govco mb-4">
                                                <div class="loader-carga-de-archivo-govco">
                                                    <div class="all-input-carga-de-archivo-govco">
                                                        <input type="file" name="documento_identidad" id="documento_identidad" class="input-carga-de-archivo-govco active" data-error="0" data-action="uploadFile" data-action-delete="deleteFile" multiple />
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
                                            <div class="container-carga-de-archivo-govco mb-4">
                                                <div class="loader-carga-de-archivo-govco">
                                                    <div class="all-input-carga-de-archivo-govco">
                                                        <input type="file" name="documento_fun" id="documento_fun" class="input-carga-de-archivo-govco active" data-error="0" data-action="uploadFile" data-action-delete="deleteFile" multiple />
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
                                            <div class="container-carga-de-archivo-govco">
                                                <div class="loader-carga-de-archivo-govco">
                                                    <div class="all-input-carga-de-archivo-govco">
                                                        <input type="file" name="documento_propiedad" id="documento_propiedad" class="input-carga-de-archivo-govco active" data-error="0" data-action="uploadFile" data-action-delete="deleteFile" multiple />
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
                                                        <button class="button-loader-carga-de-archivo-govco" disabled style="display: none;">Cargar archivo</button>
                                                    </div>
                                                </div>
                                                <div class="container-detail-carga-de-archivo-govco">
                                                    <span class="alert-carga-de-archivo-govco visually-hidden"></span>
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
                                                        <input type="file" name="documento_poder" id="documento_poder" class="input-carga-de-archivo-govco active" data-error="0" data-action="uploadFile" data-action-delete="deleteFile" multiple />
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
                                                        <button class="button-loader-carga-de-archivo-govco" disabled style="display: none;">Cargar archivo</button>
                                                    </div>
                                                </div>
                                                <div class="container-detail-carga-de-archivo-govco">
                                                    <span class="alert-carga-de-archivo-govco visually-hidden"></span>
                                                    <div class="attached-files-carga-de-archivo-govco"></div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-lg-12 mt-4">
                                            <button type="submit" class="btn-linea-activar-govco linea-link-label-govco" id="botonLineaInteHrz">
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
                }, 500);
            });
        });
        setActivo(1);
    });

    function toggleArchivoAdicional() {
        var archivoAdicional = document.getElementById('archivo_adicional');
        if (archivoAdicional.classList.contains('d-none')) {
            archivoAdicional.classList.remove('d-none');
        } else {
            archivoAdicional.classList.add('d-none');
        }
    }
</script>
@endpush