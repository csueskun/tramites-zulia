@extends('components.layout')

@section('title', 'Solicitud de Trámites')

@push('breadcrumb')
<li class="breadcrumb-item-govco active" aria-current="page">Trámites</li>
@endpush

@section('content')

<div class="admin-home mt-2" data-content="natural">
    <div class="row justify-content-between">
        <div class="col-lg-8">
            <h3 class="govcolor-blue-dark mb-4">Solicitud de Trámites</h3>
            <a href="/user/solicitudes">
                <button type="button" class="btn-govco fill-btn-govco">Ver mis solicitudes</button>
            </a>
            <p class="text-muted my-4">
                En esta sección encontrarás un listado detallado de los trámites disponibles
                relacionados con vehículos automotores. Cada trámite incluye una descripción
                clara, los requisitos necesarios, Costo total del tramite (validos hasta el año 2025)
                asociados y el Cuentas a Depositar. Además, podrás iniciar la solicitud del trámite o
                consultar su estado desde esta misma plataforma. Explora las opciones y selecciona el
                trámite que necesitas realizar de manera fácil y rápida.
            </p>
            <div class="row">
                <div class="tramites-boxes-container">
                    @foreach ($tramites as $index => $tramite)
                    <a class="module-tarjeta-govco tramite m-2" href="#"
                        data-bs-toggle="modal" data-bs-target="#tramite-modal" 
                        data-tramite-nombre="{{ $tramite->nombre }}"
                        data-tramite-descripcion="{{ $tramite->descripcion }}"
                        data-tramite-items="{{ json_encode(array_values($tramite->items->toArray())) }}"
                        data-tramite-precio="$ {{ number_format($tramite->precio, 0) }}"
                        data-tramite-total="$ {{ number_format($tramite->precio, 0) }}">
                        <div class="header-tarjeta-govco">
                            <h5>{{ $tramite->nombre }}</h5>
                        </div>
                        <hr>
                        <div class="body-tarjeta-govco">
                            <p>{{  $tramite->descripcion }}</p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            @include('components.area-servicio')
        </div>

    </div>
</div>
<div class="modal fade" id="tramite-modal" role="dialog" aria-labelledby="mdWarningLabel" aria-hidden="true">
    <div class="container-modal-govco" id="modal_warning">
        <div class="modal-container-govco" id="exampleModalWarning" tabindex="-1" data-bs-backdrop="false"
            data-bs-keyboard="false" aria-labelledby="exampleModalAdvertencia" aria-hidden="true" aria-hidden="true"
            role="dialog">
            <div class="modal-dialog modal-dialog-govco" style="max-width: 620px !important;">
                <div class="modal-content modal-content-govco">
                    <div class="modal-header modal-header-govco modal-header-alerts-govco">
                        <button type="button" disabled class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body modal-body-govco">
                        <h4 data-tramite-field="nombre" class="govcolor-blue-dark mb-4"></h4>
                        <p data-tramite-field="descripcion"></p>
                        <p>
                            Costo total del tramite: <strong><span data-tramite-field="precio"></span></strong> (validos hasta el año 2025)
                        </p>
                        <p>
                            <strong>Cuentas a Depositar: </strong><br>
                            Cuenta de ahorros <strong>BANCO DE BOGOTA - 260612163</strong>
                        </p>
                        <table class="table table-general fix">
                            <thead>
                                <tr>
                                    <th>Concepto a pagar</th>
                                    <th class="text-end">Valor</th>
                                </tr>
                            </thead>
                            <tbody data-tramite-field="items"></tbody>
                            <tfoot>
                                <tr>
                                    <th>Total</th>
                                    <th class="text-end" data-tramite-field="total"></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="modal-footer-govco modal-footer-alerts-govco">
                        <div class="modal-buttons-govco d-flex justify-content-center">
                            <a href="/user/solicitudes/nueva/{{ $tramite->id }}" class="me-2">
                                <button type="button" class="btn btn-primary btn-modal-govco" style="width: auto; padding: 0 18px !important;">Crear nueva solicitud</button>
                            </a>
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
<style>
    .pestana-content {
        display: block;
    }

    .pestana-content:not(.active) {
        display: none;
    }
</style>
<script>
    document.getElementById('tramite-modal').addEventListener('show.bs.modal', function(event) {
        var trigger = event.relatedTarget;

        const vars = [ 'nombre', 'descripcion', 'precio', 'items', 'total' ];
        vars.forEach((v, i) => {
            document.querySelector(`[data-tramite-field="${v}"]`).innerHTML = trigger.getAttribute(`data-tramite-${v}`);
        });
        const items = JSON.parse(trigger.getAttribute('data-tramite-items')) || [];
        if (items.length){
            let itemsHtml = '';
            items.forEach((item) => {
                itemsHtml += `<tr>
                    <td>${item.nombre}</td>
                    <td class="text-end">${new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP', minimumFractionDigits: 0, maximumFractionDigits: 0 }).format(item.precio)}</td>
                </tr>`;
            });
            document.querySelector(`[data-tramite-field="items"]`).innerHTML = itemsHtml;
        } else {
            document.querySelector(`[data-tramite-field="items"]`).innerHTML = '<tr><td colspan="2">Sin conceptos</td></tr>';
        }
    });

    function showPanel(panelId) {
        try {
            document.querySelectorAll(".pestana-opcion.active")[0].classList.remove('active', "focus");
        } catch (error) {
            console.log(error);
        }
        document.querySelectorAll('.pestana-opcion')[panelId].classList.add('active', 'focus');
        try {
            document.querySelectorAll(".pestana-content.active")[0].classList.remove('active');
        } catch (error) {
            console.log(error);
        }
        document.querySelectorAll('.pestana-content')[panelId].classList.add('active');
    }
</script>

@endpush