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
            @php
                $stages = ['Inicio<br/>&nbsp;', 'Hago mi<br/>solicitud', 'Procesan<br/>mi solicitud', 'Respuesta<br/>&nbsp;'];
            @endphp
            <div class="custom-progress">
                <div class="custom-progress-container">
                    @foreach ($stages as $index => $label)
                        <div class="custom-step">
                            <div class="custom-stage">{{ $index + 1 }}</div>
                            <div class="custom-label">{!! $label !!}</div>
                        </div>
                        @if ($index < count($stages) - 1)
                            <div class="custom-line-wrapper"><div class="custom-line"></div></div>
                        @endif
                    @endforeach
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
                            <br />
                            @endif
                            @if (in_array($solicitud->estado, ['APROBADA', 'VALIDADA']))
                            <a class="govco-a" href="#" data-bs-toggle="modal" data-bs-target="#enviar-pagos">
                                {{ $solicitud->tramite_id === 3 ? 'ANEXAR CONSTANCIA DE PAGO' : 'ANEXAR CONSTANCIAS DE PAGO (CUPL Y TNS)' }}</a>
                            <br>
                            <br>
                            @endif
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
                                    <br>
                                    <x-solicitud-estado :solicitud="$solicitud"/>
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
                                    <p>{{$solicitud->tramite->nombre}}</p>
                                </div>
                            </div>
                            <div class="row">
                                    
                                @if ($solicitud->vehiculo !== 'TODOS')
                                <div class="col-lg-5">
                                    <span><strong>Vehículo:</strong></span>
                                    <p>{{$solicitud->vehiculo}}</p>
                                </div>
                                @endif
                                @if ($solicitud->persona !== 'TODOS')
                                <div class="col-lg-7">
                                    <span><strong>Persona:</strong></span>
                                    <p>{{$solicitud->persona}}</p>
                                </div>
                                @endif

                            </div>
                            <div class="row contenido-etapa etapa-3">
                                <div class="col-lg-12">
                                    <span><strong>Link de pago:</strong></span>
                                    <p>
                                        @if ($solicitud->link_pago)
                                            <a href="{{ $solicitud->link_pago }}">{{ $solicitud->link_pago }}</a>
                                        @else
                                            -- Sin enlace --
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <span><strong>Nombres:</strong></span>
                                    <p>{{$solicitud->nombres}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <span><strong>Número documento:</strong></span>
                                    <p>{{$solicitud->tipo_documento}} {{$solicitud->identificacion}}</p>
                                </div>
                                <div class="col-lg-7">
                                    <span><strong>Teléfono:</strong></span>
                                    <p>{{$solicitud->telefono}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <span><strong>Comentarios:</strong></span>
                                    <br><br>
                                    @if ($solicitud->comentarios && count($solicitud->comentarios) > 0)
                                        @foreach ($solicitud->comentarios as $comentario)
                                        <div class="alert alerta-govco alerta-success-govco asuccess" role="alert">
                                            <p class="alerta-content-text px-3 py-1 align-start smaller">
                                                <strong>{{ $comentario->autor == "ADMIN" ? "FUNCIONARIO TRÁNSITO" : "USUARIO" }}:</strong>
                                                {{ $comentario->comentario }}
                                            </p>
                                        </div>
                                        <small>{{ $comentario->created_at->format('d/m/Y h:i A') }}</small>
                                        <br><br>
                                        @endforeach
                                    @else
                                        <p>No hay comentarios.</p>
                                    @endif
                                </div>
                            </div>
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
@php
$fileConfigs[] = [
        'key' => 'constancia_de_pago_tns',
        'tipo' => 'pdf',
        'max_size' => 10485760
];
if($solicitud->tramite_id !== 3) {
    $fileConfigs[] = [
        'key' => 'constancia_de_pago_cupl',
        'tipo' => 'pdf',
        'max_size' => 10485760
    ];
}
@endphp
<div class="modal fade" id="enviar-pagos" role="dialog" aria-labelledby="mdWarningLabel" aria-hidden="true">
    <div class="container-modal-govco">
        <div class="modal-container-govco" id="exampleModalWarning" tabindex="-1" data-bs-backdrop="false"
            data-bs-keyboard="false" aria-labelledby="enviar-pagos" aria-hidden="true" aria-hidden="true"
            role="dialog">
            <div class="modal-dialog modal-dialog-govco">
                <form action="/solicitudes/{{ $solicitud->id }}/comprobantes-pago" method="post" enctype="multipart/form-data" id="constancias-pagos">
                    @csrf
                    <div class="modal-content modal-content-govco">
                        <div class="modal-header modal-header-govco modal-header-alerts-govco">
                            <button type="button" disabled class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body modal-body-govco" style="margin: 12px 40px !important">
                            <div class="row">
                                @if ($solicitud->tramite_id !== 3)
                                <div class="col-lg-12">
                                    <x-gov-file-input 
                                        name="constancia_de_pago_cupl" 
                                        max="10" 
                                        type="pdf" 
                                        required="{{ true }}" 
                                        descripcion="Recibo de pago CUPL"/>
                                </div>
                                @endif
                                <div class="col-lg-12">
                                    <x-gov-file-input 
                                        name="constancia_de_pago_tns" 
                                        max="10" 
                                        type="pdf" 
                                        required="{{ true }}" 
                                        descripcion="Recibo de pago TNS"/>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer-govco modal-footer-alerts-govco">
                            <div class="modal-buttons-govco d-flex justify-space-between">
                                <button type="button" disabled="disabled" class="btn btn-primary btn-modal-govco submit" data-bs-dismiss="modal">
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
<script src="{{ asset('assets/form/carga-de-archivo.js') }}"></script>
<script>
    var fileData = {};
    var form = document.querySelector('#constancias-pagos');
    const fileConfigs = @json($fileConfigs);

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
                estadoNum = 3;
                break;
            case 'RECHAZADA':
                estadoNum = 4;
                break;
            case 'APROBADA':
                estadoNum = 3;
                break;
            case 'VALIDADA':
                estadoNum = 3;
                break;
            case 'COMPLETADA':
                estadoNum = 4;
                break;
        }

        document.querySelectorAll('.etapa-' + estadoNum).forEach(function(element) {
            element.classList.add('active');
        });
        document.querySelectorAll('.custom-step').forEach(function(step, index) {
            if (index < estadoNum - 1) {
                step.classList.add('completed');
                step.querySelector('.custom-stage').innerHTML = '';
            } else if (index === estadoNum - 1) {
                step.classList.add('current');
            }
        });
        document.querySelectorAll('.custom-line-wrapper .custom-line').forEach(function(line, index) {
            if (index < estadoNum - 1) {
                line.classList.add('completed');
            } else if (index === estadoNum - 1) {
                line.classList.add('half-completed');
            }
        });

        window.addEventListener("load", function () {
            fileConfigs.forEach(({ key, tipo, max_size }) => {
                fileData[key] = [];
                setValidationParameters('file_' + key, [tipo], max_size, 1);
                document.querySelector('#file_' + key).addEventListener('change', function (event) {
                    setTimeout(function(){
                        preValidateFileForm(form);
                    }, 2000);
                });
            });
        });
    });

    function addFileInputs(tempform, inputFileFiles, inputName) {
        const dataTransfer = new DataTransfer();
        inputFileFiles.forEach(file => dataTransfer.items.add(file));
        var inputFile = document.createElement("input");
        inputFile.type = "file";
        inputFile.name = inputName.replace('file_', '');
        inputFile.files = dataTransfer.files;
        return inputFile;
    }

    function preValidateFileForm(form) {
        const isFormValid = validateForm(form);
        setTimeout(function () {
            validateFileForm(form, function () {
                if(isFormValid){
                    form.querySelector('button.submit').removeAttribute('disabled');
                    const dataTransfer = new DataTransfer();
                    const tempForm = cloneFileForm(form);
                    fileConfigs.forEach(({ key, tipo, max_size }) => {
                        tempForm.appendChild(addFileInputs(tempForm, fileData[key], 'file_' + key));
                    });
                    document.body.appendChild(tempForm);
                    tempForm.submit();
                }
                else{
                    form.querySelector('button.submit').setAttribute('disabled', 'disabled');
                }
            }, function () {
            }, true)
        }, 200);
    }
</script>
@endpush