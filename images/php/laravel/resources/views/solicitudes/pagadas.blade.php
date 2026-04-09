@extends('components.layout')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/transversal/paginacion.css') }}">
@endpush

@section('title', 'Solicitudes pendientes de validar pago')

@push('breadcrumb')
<li class="breadcrumb-item-govco"><a href="/home">Trámites</a></li>
<li class="breadcrumb-item-govco active" aria-current="page">Solicitudes pendientes de validar pago</li>
@endpush

@section('content')

<div class="admin-home mt-2" data-content="natural">
    <div class="row justify-content-between">
        <div class="col-lg-9">
            @include('components.session-messages')
            <h1 class="mb-4">Solicitudes pendientes de validar pago</h1>
            <x-table-options action="/solicitudes/pagadas"/> 
            <div class="container-tabla">
                <table class="table table-general fix tabla-govco actived-events-govcotabla-govco actived-events-govco" aria-describedby="tableDescCursorRows">
                    <thead class="encabezado-tabla">
                        <tr>
                            <th width="1">Radicado</th>
                            <th width="1">Fecha<br />solicitud</th>
                            <!-- <th width="1">Fecha<br />aprobacion</th> -->
                            <th>Trámite</th>
                            <!-- <th width="1">Recibo<br />enviado</th> -->
                            <th width="1">Pago<br />validado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="contenido-tablas contenido-hover">
                        @foreach ($solicitudes as $solicitud)
                        <tr>
                            <td>{{$solicitud->radicado}}</td>
                            <td>{{ $solicitud->created_at->format('d/m/Y') }}</td>
                            <!-- <td>{{ $solicitud->fecha_aprobacion->format('d/m/Y') }}</td> -->
                            <td><span class="max-w350">{{$solicitud->tramite->nombre}}</span></td>
                            <!-- <td><span class="etiqueta-govco {{$solicitud->recibo_pago ? 'completado' : 'pendiente'}}">{{$solicitud->recibo_pago ? $solicitud->recibo_pago->created_at->format('d/m/Y') : 'PENDIENTE'}}</span></td> -->
                            <td><span class="etiqueta-govco {{$solicitud->fecha_validacion ? 'completado' : 'pendiente'}}">{{$solicitud->fecha_validacion ? $solicitud->fecha_validacion->format('d/m/Y') : 'PENDIENTE'}}</span></td>
                            <td>
                                <div>
                                    <a class="govco-a" href="/" data-bs-toggle="modal" data-bs-target="#ver-mas"
                                        data-bs-radicado="{{$solicitud->radicado}}"
                                        data-bs-fechasolicitud="{{$solicitud->created_at->format('d/m/Y')}}"
                                        data-bs-estado="{{$solicitud->estado}}"
                                        data-bs-fecharespuesta="{{$solicitud->fecha_aprobacion ? $solicitud->fecha_aprobacion->format('d/m/Y') : 'PENDIENTE'}}"
                                        data-bs-reciboenviado="{{$solicitud->recibo_pago ? $solicitud->recibo_pago->created_at->format('d/m/Y') : 'PENDIENTE'}}"
                                        data-bs-pagovalidado="{{$solicitud->fecha_validacion ? $solicitud->fecha_validacion->format('d/m/Y') : 'PENDIENTE'}}"
                                        data-bs-asunto="{{$solicitud->tramite->nombre}}"
                                        data-bs-nombres="{{$solicitud->nombres}}"
                                        data-bs-numerodocumento="{{$solicitud->tipo_documento}} {{$solicitud->identificacion}}"
                                        data-bs-telefono="{{$solicitud->telefono}}"
                                        data-bs-correoelectronico="{{$solicitud->usuario->email}}"
                                        data-bs-comentario="{{$solicitud->comentario}}"
                                        data-bs-recibovencido="{{ $solicitud->recibo_pago->created_at->format('Ymd') < now()->format('Ymd') ? 'true' : 'false' }}"
                                        data-bs-constancia-pago="{{$solicitud->constancia_pago ? 1 : 0}}"
                                        data-bs-certificado="{{$solicitud->certificado ? 1 : 0}}"
                                        data-bs-documentos="{{ json_encode(array_values($solicitud->documentos_usuario->toArray())) }}">
                                        VER MÁS</a>
                                    @if($solicitud->fecha_validacion)
                                    @else
                                    / <a class="govco-a" href="/" data-bs-toggle="modal" data-bs-target="#validar-pago"
                                        data-bs-id="{{$solicitud->id}}"
                                        data-bs-cupl="{{ $solicitud->tramite_id != 3 }}"
                                        data-bs-usuario-id="{{ $solicitud->id }}">
                                        VALIDAR PAGO</a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @if ($solicitudes->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center">No se encontraron solicitudes.</td>
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
                        route="/solicitudes/pagadas" 
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

<div class="modal fade" id="ver-mas" role="dialog" aria-labelledby="ver-mas" aria-hidden="true">
    <div class="container-modal-govco" id="modal_ver_mas">
        <div class="modal-container-govco" id="verMasModalContainer" tabindex="-1" data-bs-backdrop="false"
            data-bs-keyboard="false" aria-labelledby="ver-mas" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-govco modal-lg">
                <div class="modal-content modal-content-govco">
                    <div class="modal-header modal-header-govco">
                        <a href="javascript:void(0)" role="button" data-bs-dismiss="modal" class="close-btn-modal"
                            aria-label="Close" aria-expanded="false" onclick="closeModal('modal_ver_mas')">
                            <span class="modal-close-govco govco-times"></span>
                        </a>
                    </div>
                    <div class="modal-body modal-body-govco">
                        <h3 class="modal-title-govco mb-4">Detalle de la solicitud</h3>
                        <div class="row">
                            <div class="col-lg-5">
                                <span class="modal-text-govco"><strong>Radicado:</strong></span>
                                <p class="modal-text-govco"></p>
                            </div>
                            <div class="col-lg-7">
                                <span class="modal-text-govco"><strong>Fecha Solicitud:</strong></span>
                                <p class="modal-text-govco"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <span class="modal-text-govco"><strong>Estado:</strong></span>
                                <p class="modal-text-govco"></p>
                            </div>
                            <div class="col-lg-7">
                                <span class="modal-text-govco"><strong>Fecha Aprobación:</strong></span>
                                <p class="modal-text-govco"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <span class="modal-text-govco"><strong>Recibo enviado:</strong></span>
                                <p class="modal-text-govco etiqueta-govco" style="width: fit-content;"></p>
                            </div>
                            <div class="col-lg-7">
                                <span class="modal-text-govco"><strong>Pago validado:</strong></span>
                                <p class="modal-text-govco etiqueta-govco" style="width: fit-content;"></p>
                            </div>
                        </div>
                        <div class="row vencido visually-hidden">
                            <div class="col-lg-12 pb-2">
                                <div class="text-box error-text-box">
                                    <span class="modal-text-govco"><strong>Recibo Vencido:</strong></span>
                                    <span class="modal-text-govco">El recibo de pago ha vencido, por favor vuelva al módulo <a class="link-tipografia-govco" href="/solicitudes/aceptadas">Enviar recibo de pago</a> para generar un recibo nuevo</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <span class="modal-text-govco"><strong>Asunto:</strong></span>
                                <p class="modal-text-govco"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <span class="modal-text-govco"><strong>Nombres:</strong></span>
                                <p class="modal-text-govco"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <span class="modal-text-govco"><strong>Número documento:</strong></span>
                                <p class="modal-text-govco"></p>
                            </div>
                            <div class="col-lg-7">
                                <span class="modal-text-govco"><strong>Teléfono:</strong></span>
                                <p class="modal-text-govco"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <span class="modal-text-govco"><strong>Correo Electrónico:</strong></span>
                                <p class="modal-text-govco"></p>
                            </div>
                        </div>
                        <div id="documentos-container">
                            <span class="modal-text-govco"><strong>Documentos:</strong></span>
                            <table id="documentos-table" class="table table-general fix" aria-describedby="tableDescCursorRows">
                                <tbody class="contenido-tablas contenido-hover">
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="modal-text-govco">
                                    <strong>
                                        Para consultar si el pago fue realizado, lo puede hacer dando click 
                                        en el siguiente enlace:
                                        <a class="link-tipografia-govco" href="https://oficinavirtual.tns.co/RecPago/Accesar?codemp=fos6Xzuc65b4kjqAZQxbQQ%253d%253d" target="_blank">Consultar pagos</a>
                                    </strong>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer-govco">
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


<div class="modal fade" id="validar-pago" role="dialog" aria-labelledby="validar-pago" aria-hidden="true">
    <div class="container-modal-govco" id="modal_validar_pago">
        <div class="modal-container-govco" id="validar-pago-modal" tabindex="-1" data-bs-backdrop="false"
            data-bs-keyboard="false" aria-labelledby="validar-pago" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-govco">
                <form action="" method="post">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="estado" value="VALIDADA">
                    <div class="modal-content modal-content-govco">
                        <div class="modal-header modal-header-govco">
                        </div>
                        <div class="modal-body modal-body-govco">
                            <div class="modal-icon text-center">
                                <span class="govco-icon govco-info-circle"></span>
                            </div>
                            <h3 class="modal-title-govco mb-4 text-center margin-auto">Validar Pago<br><br></h3>
                            <p class="modal-text-govco text-center">¿Está seguro de validar el pago de esta solicitud?</p>
                        </div>
                        <div class="modal-footer-govco">
                            <div class="modal-buttons-govco d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary btn-modal-govco">
                                    Validar
                                </button>
                                <button type="button" class="btn btn-primary btn-modal-govco btn-contorno" data-bs-dismiss="modal">
                                    Cancelar
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
            'radicado', 'fechasolicitud', 'estado', 'fecharespuesta', 'reciboenviado', 'pagovalidado',
            'asunto', 'nombres', 'numerodocumento', 'telefono', 'correoelectronico'
        ];
        vars.forEach((v, i) => {
            fields[i].innerHTML = trigger.getAttribute(`data-bs-${v}`);
        });

        const estadoField = fields[2];
        estadoField.innerHTML = printSolicitudEstado(
            trigger.getAttribute('data-bs-estado'),
            trigger.getAttribute('data-bs-certificado') === '1',
            trigger.getAttribute('data-bs-constancia-pago') === '1'
        );

        // Remove existing classes before adding new ones
        fields[4].classList.remove('pendiente', 'completado');
        fields[5].classList.remove('pendiente', 'completado');

        fields[4].classList.add(fields[4].innerHTML === "PENDIENTE" ? 'pendiente' : 'completado');
        fields[5].classList.add(fields[5].innerHTML === "PENDIENTE" ? 'pendiente' : 'completado');

        verMas.querySelector('.row.vencido').classList.add('visually-hidden');
        if(trigger.getAttribute(`data-bs-recibovencido`) === 'true') {
            if(trigger.getAttribute(`data-bs-estado`) !== 'VALIDADA'){
                verMas.querySelector('.row.vencido').classList.remove('visually-hidden');
            }
        }

        const documentos = JSON.parse(trigger.getAttribute('data-bs-documentos'));
        renderDocumentosTable(documentos);
    })
    
    var validarPaogo = document.getElementById('validar-pago');
    validarPaogo.addEventListener('show.bs.modal', function(event) {
        var trigger = event.relatedTarget;
        const solicitudId = trigger.getAttribute('data-bs-id');
        const cupl = trigger.getAttribute('data-bs-cupl');
        validarPaogo.querySelector('.modal-dialog form').setAttribute('action', '/solicitudes/'+solicitudId);
        validarPaogo.querySelector('p').innerHTML = cupl == "1" ? '¿Los soportes de pagos (TNS y CUPL) fueron verificados correctamente?' : '¿El soporte de pago de TNS fue verficado correctamente?';
    });
</script>

@endpush