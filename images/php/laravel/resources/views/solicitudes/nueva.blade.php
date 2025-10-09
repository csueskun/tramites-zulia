@extends('components.layout')

@section('title', 'Nueva Solicitud')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/general/linea-avance2.css') }}">
@endpush

<x-s2mc-button element="nombres" />

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
                            <div class="custom-label">Inicio<br/>&nbsp;</div>
                        </div>
                        <div class="custom-line-wrapper">
                            <div class="custom-line half-completed"></div>
                        </div>
                        <div class="custom-step">
                            <div class="custom-stage">2</div>
                            <div class="custom-label">Hago mi<br/>solicitud</div>
                        </div>
                        <div class="custom-line-wrapper">
                            <div class="custom-line"></div>
                        </div>
                        <div class="custom-step">
                            <div class="custom-stage">3</div>
                            <div class="custom-label">Procesan<br/>mi solicitud</div>
                        </div>
                        <div class="custom-line-wrapper">
                            <div class="custom-line"></div>
                        </div>
                        <div class="custom-step">
                            <div class="custom-stage">4</div>
                            <div class="custom-label">Respuesta<br/>&nbsp;</div>
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
                                    <div class="modal-body modal-body-govco" style="margin: 12px 0px !important">
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
                                            <div class="col-lg-9">
                                                <div class="entradas-de-texto-govco col-lg-12 px-2 nueva-solicitud">
                                                    <label for="nombres">Nombres*</label>
                                                    <div class="container-input-texto-govco">
                                                        <input required typeData="onlyText" type="text" name="nombres" id="nombres"
                                                            placeholder="Ejemplo: Juan Pérez" aria-required="true"
                                                            class="@error('nombres') error @enderror" oninvalid="this.setCustomValidity('Solo se permiten letras y espacios')" 
                                                            onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')"
                                                            value="{{ old('nombres') }}" pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios">
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
                                                    <div id="dropdown_container" class="desplegable-govco @error('tipo_documento') error-desplegable-govco @enderror"
                                                        id="lista-desplegables" data-type="basic">
                                                        <select required typeData="select" aria-invalid="false" aria-describedby="tipo_documento"
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
                                                    <sp class="error-texto-govco alert-entradas-de-texto-govco" role="alert" aria-live="assertive"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 ps-0">
                                                <div class="entradas-de-texto-govco col-lg-12 px-2 nueva-solicitud">
                                                    <label for="identificacion">Identificacion*</label>
                                                    <div class="container-input-texto-govco">
                                                        <input required typeData="onlyNumber" type="number" name="identificacion" id="identificacion"
                                                            placeholder="Ejemplo: 1234567890" aria-required="true" minlength="7" maxlength="10"
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
                                            <div class="col-lg-4">
                                                <div class="entradas-de-texto-govco col-lg-12 px-2 nueva-solicitud">
                                                    <label for="telefono">Teléfono *</label>
                                                    <div class="container-input-texto-govco">
                                                        <input required typeData="onlyNumber" type="text" name="telefono" id="telefono" regex="[0-9]*"
                                                            oninvalid="this.setCustomValidity('Por favor, ingrese un número de teléfono válido')"
                                                            onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')"
                                                            placeholder="3123456789" aria-required="true" class="@error('telefono') error @enderror"
                                                            value="{{ old('telefono') }}" minlength="7" maxlength="10">
                                                        <div class="icon-entradas-de-texto-govco success-icon-entradas-de-texto-govco"
                                                            aria-label="success" aria-hidden="true"></div>
                                                        <div class="icon-entradas-de-texto-govco error-icon-entradas-de-texto-govco"
                                                            aria-label="error" aria-hidden="true"></div>
                                                    </div>
                                                    <div class="container-detail-carga-de-archivo-govco">
                                                        <span id="telefono_error" class="alert-carga-de-archivo-govco visually-hidden"></span>
                                                        <div class="attached-files-carga-de-archivo-govco"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if (in_array($tramite->id, [1, 2, 4, 7, 8, 9]))
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
                                        @endif
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
                                                @if($meta['nombre'] === 'poder')
                                                <label for="check_adicional" class="form-label">
                                                    <input type="checkbox" id="check_adicional" name="check_adicional"
                                                        onclick="toggleArchivoPoder()">
                                                    ¿Esta realizando el tramite para una tercera persona?
                                                </label>
                                                @endif
                                                <x-gov-file-input 
                                                    name="{{ $meta['nombre'] }}" 
                                                    max="{{ $meta['max_size']/(1024*1024) }}" 
                                                    type="{{ $meta['tipo'] }}" 
                                                    required="{{ $archivo->obligatorio }}" 
                                                    descripcion="{{ $archivo->descripcion }}"/>
                                            </div>
                                            @endforeach
                                        </div>
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
                                                    El soporte de pago se emitirá y se enviará al correo <strong>{{ Auth::user()->email }}</strong> una vez sus requisitos sean revisados y
                                                    aprobados por la entidad.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-4">
                                        <button onclick="preValidateFileForm(this.closest('form'))" type="button" class="btn btn-primary btn-modal-govco fit-content submit">
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
            document.getElementById('container_file_poder').style.display = 'none'; // Hide the poder file input by default
            @if(old('tipo_documento'))
                const tipoDocumentoSelect = document.getElementById('tipo_documento');
                const oldTipoDocumento = "{{ old('tipo_documento') }}";
                if (oldTipoDocumento) {
                    tipoDocumentoSelect.value = oldTipoDocumento;
                }
            @endif

            const onlyTextInputs = document.querySelectorAll('input[typeData="onlyText"]');
            methodAssign("keyup", onlyTextValidator, onlyTextInputs);
            const onlyNumberInputs = document.querySelectorAll('input[typeData="onlyNumber"]');
            methodAssign("keyup", onlyNumberValidator, onlyNumberInputs);
            document.getElementById('dropdown_container').addEventListener('change', function(event) {
                const input = this.querySelector('input[typedata="select"]');
                selectValidator.call(input);
            });
        });

        var fileDocumentoIdentidad = [];
        var fileDocumentoFun = [];
        var fileDocumentoPropiedad = [];
        var filePoder = [];
        var form = document.querySelector('#nueva-solicitud');

        function toggleArchivoPoder() {
            var archivoPoder = document.getElementById('container_file_poder');
            archivoPoder.style.display = archivoPoder.style.display === 'none' ? 'block' : 'none';
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

        function addFileInputs(tempform, inputFileFiles, inputName) {
            const dataTransfer = new DataTransfer();
            inputFileFiles.forEach(file => dataTransfer.items.add(file));
            var inputFile = document.createElement("input");
            inputFile.type = "file";
            inputFile.name = inputName;
            inputFile.files = dataTransfer.files;
            return inputFile;
        }

        function preValidateFileForm(form) {
            const isFormValid = validateForm(form);
            setTimeout(function () {
                validateFileForm(form, function () {
                    if(isFormValid){
                        form.querySelector('button.submit').setAttribute('disabled', 'disabled');
                        const dataTransfer = new DataTransfer();
                        const tempForm = cloneFileForm(form);
                        fileConfigs.forEach(({ key, tipo, max_size }) => {
                            tempForm.appendChild(addFileInputs(tempForm, fileData[key], 'file_' + key));
                        });
                        document.body.appendChild(tempForm);
                        tempForm.submit();
                    }
                }, function () {
                }, true)
            }, 200);
        }
    </script>
@endpush