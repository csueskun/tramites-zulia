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
                @php
                    $stages = ['Generar<br/>Solicitud', 'Esperar<br/>Aprobación', 'Enviar<br/>Pago', 'Esperar<br/>Validación', 'Recibir<br/>Certificado'];
                @endphp
                <div class="custom-progress">
                    <div class="custom-progress-container">
                        <div class="custom-step completed">
                            <div class="custom-stage"></div>
                            <div class="custom-label">Generar<br>Solicitud</div>
                        </div>
                        <div class="custom-line-wrapper">
                            <div class="custom-line half-completed"></div>
                        </div>
                        <div class="custom-step">
                            <div class="custom-stage">2</div>
                            <div class="custom-label">Esperar<br>Aprobación</div>
                        </div>
                        <div class="custom-line-wrapper">
                            <div class="custom-line"></div>
                        </div>
                        <div class="custom-step">
                            <div class="custom-stage">3</div>
                            <div class="custom-label">Enviar<br>Pago</div>
                        </div>
                        <div class="custom-line-wrapper">
                            <div class="custom-line"></div>
                        </div>
                        <div class="custom-step">
                            <div class="custom-stage">4</div>
                            <div class="custom-label">Esperar<br>Validación</div>
                        </div>
                        <div class="custom-line-wrapper">
                            <div class="custom-line"></div>
                        </div>
                        <div class="custom-step">
                            <div class="custom-stage">5</div>
                            <div class="custom-label">Recibir<br>Certificado</div>
                        </div>
                    </div>
                </div>
                <div class="container-principal-linea-interaccion-govco">
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

                                <form id="nueva-solicitud" action="/solicitudes" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="tramite_id" value="{{$tramite->id}}">
                                    <input type="hidden" name="persona" value="{{$persona}}">
                                    <input type="hidden" name="vehiculo" value="{{$vehiculo}}">
                                    <div class="modal-body modal-body-govco" style="margin: 12px 40px !important">
                                        <div class="row">
                                            @if ($vehiculo !== 'TODOS')
                                            <p>
                                                <label for="vehiculo">Vehículo:</label>
                                                <strong>
                                                    {{ $vehiculo }}
                                                </strong>
                                            </p>
                                            @endif
                                            @if ($persona !== 'TODOS')
                                            <p>
                                                <label for="persona">Persona:</label>
                                                <strong>
                                                    {{ $persona }}
                                                </strong>
                                            </p>
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="entradas-de-texto-govco col-lg-12 px-2 nueva-solicitud">
                                                    <label for="nombres">nombres*</label>
                                                    <div class="container-input-texto-govco">
                                                        <input  type="text" name="nombres" id="nombres"
                                                            placeholder="" aria-required="true"
                                                            class="@error('nombres') error @enderror"
                                                            value="{{ old('nombres') }}">
                                                        <div class="icon-entradas-de-texto-govco success-icon-entradas-de-texto-govco"
                                                            aria-label="success" aria-hidden="true"></div>
                                                        <div class="icon-entradas-de-texto-govco error-icon-entradas-de-texto-govco"
                                                            aria-label="error" aria-hidden="true"></div>
                                                    </div>
                                                    <div class="container-detail-carga-de-archivo-govco">
                                                        <span id="nombres_error" class="alert-carga-de-archivo-govco visually-hidden"></span>
                                                        <div class="attached-files-carga-de-archivo-govco"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <div class="entradas-de-texto-govco col-lg-12 px-2 nueva-solicitud">
                                                    <label for="tipo_documento" class="label-desplegable-govco">Tipo de
                                                        documento<span aria-required="true">*</span></label>
                                                    <div class="desplegable-govco @error('tipo_documento') error-desplegable-govco @enderror"
                                                        id="lista-desplegables" data-type="basic">
                                                        <select  aria-invalid="false" aria-describedby="tipo_documento"
                                                            name="tipo_documento" id="tipo_documento">
                                                            <option disabled selected>Escoger</option>
                                                            <option value="CC">Cédula de ciudadanía</option>
                                                            <option value="CE">Cédula de extranjería</option>
                                                            <option value="PA">Pasaporte</option>
                                                            <option value="RC">Registro civil</option>
                                                            <option value="TI">Tarjeta de identidad</option>
                                                        </select>
                                                        <div class="icon-entradas-de-texto-govco success-icon-entradas-de-texto-govco"
                                                                aria-label="success" aria-hidden="true"></div>
                                                            <div class="icon-entradas-de-texto-govco error-icon-entradas-de-texto-govco"
                                                                aria-label="error" aria-hidden="true"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 ps-0">
                                                <div class="entradas-de-texto-govco col-lg-12 px-2 nueva-solicitud">
                                                    <label for="identificacion">identificacion*</label>
                                                    <div class="container-input-texto-govco">
                                                        <input  type="text" name="identificacion" id="identificacion"
                                                            placeholder="" aria-required="true"
                                                            class="@error('identificacion') error @enderror"
                                                            value="{{ old('identificacion') }}">
                                                        <div class="icon-entradas-de-texto-govco success-icon-entradas-de-texto-govco"
                                                            aria-label="success" aria-hidden="true"></div>
                                                        <div class="icon-entradas-de-texto-govco error-icon-entradas-de-texto-govco"
                                                            aria-label="error" aria-hidden="true"></div>
                                                    </div>
                                                    <div class="container-detail-carga-de-archivo-govco">
                                                        <span id="identificacion_error" class="alert-carga-de-archivo-govco visually-hidden"></span>
                                                        <div class="attached-files-carga-de-archivo-govco"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="entradas-de-texto-govco col-lg-12 px-2 nueva-solicitud">
                                                    <label for="email">Dirección de correo electrónico *</label>
                                                    <div class="container-input-texto-govco">
                                                        <input  type="text" name="email" id="email"
                                                            aria-required="true" class="@error('email') error @enderror"
                                                            value="{{ old('email') }}">
                                                        <div class="icon-entradas-de-texto-govco success-icon-entradas-de-texto-govco"
                                                            aria-label="success" aria-hidden="true"></div>
                                                        <div class="icon-entradas-de-texto-govco error-icon-entradas-de-texto-govco"
                                                            aria-label="error" aria-hidden="true"></div>
                                                    </div>
                                                    <div class="container-detail-carga-de-archivo-govco">
                                                        <span id="email_error" class="alert-carga-de-archivo-govco visually-hidden"></span>
                                                        <div class="attached-files-carga-de-archivo-govco"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 mb-4">
                                                <label for="documento_identidad"
                                                    class="label-carga-de-archivo-govco">Descargar y diligenciar archivo
                                                    (FUN)</label>
                                                <a href="{{ asset('assets/FUN.xls') }}"
                                                    download="B16-Ministerio-de-Transporte.xls" class="boton-descarga">
                                                    <button type="button" class="btn-govco outline-btn-govco">Descargar
                                                        Formulario Fun</button>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            @foreach ($tramite->getArchivosFiltrados($vehiculo, $persona) as $archivo)
                                            @php
                                                $meta = $archivo->file_metadata;
                                                $fileConfigs[] = [
                                                    'key' => $meta['nombre'],
                                                    'tipo' => $meta['tipo'],
                                                    'max_size' => $meta['max_size']
                                                ];
                                            @endphp
                                            <div class="col-lg-12 mb-4">
                                                @if($meta['nombre'] === 'poder')<strong>¿Esta realizando el tramite para una tercera persona?</strong><br><br>@endif
                                                <x-gov-file-input 
                                                    name="{{ $meta['nombre'] }}" 
                                                    max="{{ $meta['max_size']/(1024*1024) }}" 
                                                    required="{{ $archivo->obligatorio }}" 
                                                    descripcion="{{ $archivo->descripcion }}"/>
                                            </div>
                                            @endforeach

                                        </div>

                                        <!-- <div class="col-lg-12 mt-4">
                                            <label for="check_adicional" class="form-label">
                                                <input type="checkbox" id="check_adicional" name="check_adicional"
                                                    onclick="toggleArchivoAdicional()">
                                                ¿Esta realizando el tramite para una tercera persona?
                                            </label>
                                        </div> -->
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="table table-general fix min" id="requerimientos-table"
                                                style="display: table;">
                                                <thead>
                                                    <tr>
                                                        <th>Tenga en cuenta que debe contar con los siguientes requisitos</th>
                                                    </tr>
                                                </thead>
                                                <tbody data-tramite-field="requerimientos">
                                                    @foreach ($tramite->requerimientos as $requerimiento)
                                                        @if ($requerimiento->tipo == 'MENCION' && in_array($requerimiento->vehiculo, ['TODOS', $vehiculo]) && in_array($requerimiento->persona, ['TODOS', $persona]))
                                                            <tr>
                                                                <td>{{ $requerimiento->descripcion }}</td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="container-alerta-govco mt-2">
                                            <div class="alert alerta-govco alerta-success-govco asuccess" role="alert">
                                                <p class="alerta-content-text p-4">
                                                    El recibo de pago se emitirá y se enviará al correo <strong>{{ Auth::user()->email }}</strong> una vez sus requisitos sean revisados y
                                                    aprobados por la entidad.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-4">
                                        <button disabled type="submit" class="btn btn-primary btn-modal-govco fit-content">
                                            Guardar Solicitud
                                        </button>
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
    <script src="{{ asset('assets/form/carga-de-archivo.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var fileInputs = document.querySelectorAll('.input-carga-de-archivo-govco');
            fileInputs.forEach(function (fileInput) {
                fileInput.addEventListener('change', function () {
                    timeOut = setTimeout(() => {
                        this.parentElement.parentElement.querySelector('.button-loader-carga-de-archivo-govco').click();
                    }, 100);
                });
            });
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
        const fileConfigs = @json($fileConfigs);
        const fileData = {};

        window.addEventListener("load", function () {
            fileConfigs.forEach(({ key, tipo, max_size }) => {
                fileData[key] = [];
                setValidationParameters('file_' + key, [tipo], max_size, 1);
            });
        });

        form.addEventListener('submit', function (event) {
            event.preventDefault();
            const dataTransfer = new DataTransfer();
            const tempForm = cloneFileForm(form);
            fileConfigs.forEach(({ key, tipo, max_size }) => {
                tempForm.appendChild(addFileInputs(tempForm, fileData[key], 'file_' + key));
            });
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
        document.getElementById('tipo_documento').addEventListener('change', preValidateFileForm.bind(this, form));
        document.querySelectorAll('input[type="text"]').forEach(input => {
            input.addEventListener('input', preValidateFileForm.bind(this, form));
        });

        function preValidateFileForm(form) {
            setTimeout(function () {
                validateFileForm(form, function () {
                    form.querySelector('button[type="submit"]').removeAttribute('disabled');
                }, function () {
                    form.querySelector('button[type="submit"]').setAttribute('disabled', 'disabled');
                }, true)
            }, 200);
        }
    </script>
@endpush