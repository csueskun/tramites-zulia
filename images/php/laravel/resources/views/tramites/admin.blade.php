@extends('components.layout')

@section('title', 'Trámites')

@push('breadcrumb')
<li class="breadcrumb-item-govco" aria-current="page"><a href="/home">Trámites</a></li>
<li class="breadcrumb-item-govco active" aria-current="page">Administración</li>
@endpush

@section('content')

<div class="admin-home mt-2" data-content="natural">
    <div class="row justify-content-between">
        <div class="col-lg-9">
            @include('components.session-messages')
            <h3 class="govcolor-blue-dark mb-4">Trámites</h3>
            <div class="container-tabla">
                <table class="table table-general fix" aria-describedby="tableDescCursorRows">
                    <thead class="encabezado-tabla">
                        <tr>
                            <th style="width:100%">Nombre</th>
                            <!-- <th width="1">Descripción</th> -->
                            <th width="1">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="contenido-tablas contenido-hover">
                        @foreach ($tramites as $tramite)
                        <tr>
                            <td>{{$tramite->nombre}}</td>
                            <!-- <td>{{$tramite->descripcion}}</td> -->
                            <td>
                                <a class="govco-a" href="#" data-bs-toggle="modal"
                                    data-bs-nombre="{{ $tramite->nombre }}"
                                    data-bs-descripcion="{{ $tramite->descripcion }}"
                                    data-bs-items="{{ json_encode(array_values($tramite->items->toArray())) }}"
                                    data-bs-personas="{{ json_encode(array_values($tramite->personas->toArray())) }}"
                                    data-bs-requerimientos="{{ json_encode(array_values($tramite->requerimientos->toArray())) }}"
                                    data-bs-vehiculos="{{ json_encode(array_values($tramite->vehiculos->toArray())) }}"
                                    data-bs-target="#detalles-modal">
                                    DETALLES</a>
                                / <a class="govco-a" href="/tramites/{{ $tramite->id }}">EDITAR</a>
                            </td>
                        </tr>
                        @endforeach
                        @if ($tramites->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center">No se encontraron trámites.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-lg-3">
            @include('components.area-servicio')
        </div>

    </div>
</div>
<div class="modal fade" id="detalles-modal" role="dialog" aria-labelledby="mdWarningLabel" aria-hidden="true">
    <div class="container-modal-govco">
        <div class="modal-container-govco" id="exampleModalWarning" tabindex="-1" data-bs-backdrop="false"
            data-bs-keyboard="false" aria-labelledby="exampleModalAdvertencia" aria-hidden="true" aria-hidden="true"
            role="dialog">
            <div class="modal-dialog modal-dialog-govco">
                <div class="modal-content modal-content-govco" style="font-size: 0.9em">
                    <div class="modal-body modal-body-govco" style="margin: 12px 40px !important">
                        <h4 class="govcolor-blue-dark" data-content></h4>
                        <p data-content></p>
                        <div data-content></div>
                        <div data-content></div>
                        <div data-content></div>
                        <div data-content></div>
                        <div data-content></div>
                    </div>
                    <div class="modal-footer-govco modal-footer-alerts-govco">
                        <div class="modal-buttons-govco d-flex justify-space-between">
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
<script>
    var verMas = document.getElementById('detalles-modal');
    verMas.addEventListener('show.bs.modal', function(event) {
        var trigger = event.relatedTarget;
        var fields = verMas.querySelectorAll('[data-content]');
        fields[0].innerHTML = trigger.getAttribute('data-bs-nombre');
        fields[1].innerHTML = trigger.getAttribute('data-bs-descripcion');
        const items = JSON.parse(trigger.getAttribute('data-bs-items'));
        const estampillas = items.filter(item => item.tipo === 'ESTAMPILLA').map(
            function(item){
                return [item.nombre, formatCurrency(item.precio)]
            }
        );
        fields[2].innerHTML = modalTable(['Estampillas', 'Valor'], estampillas);
        const costos = items.filter(item => item.tipo === 'COSTO').map(
            function(item){
                if(item.vehiculo !== 'TODOS'){
                    item.nombre += ` (${item.vehiculo})`;
                }
                if(item.persona !== 'TODOS'){
                    item.nombre += ` (${item.persona})`;
                }
                return [item.nombre, formatCurrency(item.precio)]
            }
        );
        fields[3].innerHTML = modalTable(['Costos', 'Valor'], costos);
        let requerimientos = JSON.parse(trigger.getAttribute('data-bs-requerimientos'));
        requerimientos = requerimientos.map(
            function(req){
                if(req.vehiculo !== 'TODOS'){
                    req.descripcion += ` (${req.vehiculo})`;
                }
                if(req.persona !== 'TODOS'){
                    req.descripcion += ` (${req.persona})`;
                }
                return [req.descripcion]
            }
        );
        fields[4].innerHTML = modalTable(['Requerimiento'], requerimientos);
        const personas = JSON.parse(trigger.getAttribute('data-bs-personas'));
        if(personas.length > 0){
            fields[5].innerHTML = modalTable(['Tipo de Persona'], personas.map(
                function(persona){
                    return [persona.persona]
                }
            ));
        }
        const vehiculos = JSON.parse(trigger.getAttribute('data-bs-vehiculos'));
        if(vehiculos.length > 0){
            fields[6].innerHTML = modalTable(['Tipo de Vehículo'], vehiculos.map(
                function(vehiculo){
                    return [vehiculo.vehiculo]
                }
            ));
        }
    });

</script>
@endpush