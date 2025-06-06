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
                        data-tramite-id="{{ $tramite->id }}"
                        data-tramite-nombre="{{ $tramite->nombre }}"
                        data-tramite-descripcion="{{ $tramite->descripcion }}"
                        data-tramite-costos="{{ json_encode(array_values($tramite->costos->toArray())) }}"
                        data-tramite-vehiculos="{{ json_encode(array_values($tramite->vehiculos->toArray())) }}"
                        data-tramite-personas="{{ json_encode(array_values($tramite->personas->toArray())) }}"
                        data-tramite-estampillas="{{ json_encode(array_values($tramite->estampillas->toArray())) }}"
                        data-tramite-requerimientos="{{ json_encode(array_values($tramite->requerimientos->toArray())) }}">
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
                <form action="/user/solicitudes/nueva" method="POST" id="tramite-form">
                    @csrf
                    <input type="hidden" name="tramite_id" value="" data-tramite-field="id">
                    <div class="modal-content modal-content-govco">
                        <div class="modal-header modal-header-govco modal-header-alerts-govco">
                            <button type="button" disabled class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body modal-body-govco">
                            <h4 data-tramite-field="nombre" class="govcolor-blue-dark mb-4"></h4>
                            <p data-tramite-field="descripcion"></p>
                            <p><div class="radio-seleccion-govco" data-tramite-field="vehiculos"></div></p>
                            <p><div class="radio-seleccion-govco" data-tramite-field="personas"></div></p>
                            <table class="table table-general fix min" id="requerimientos-table">
                                <thead>
                                    <tr>
                                        <th>Requisitos</th>
                                    </tr>
                                </thead>
                                <tbody data-tramite-field="requerimientos"></tbody>
                            </table>
                            <table class="table table-general fix min" id="costos-table">
                                <thead>
                                    <tr>
                                        <th>Concepto a pagar</th>
                                        <th class="text-end">Valor</th>
                                    </tr>
                                </thead>
                                <tbody data-tramite-field="costos"></tbody>
                                <tfoot>
                                    <tr>
                                        <th>Total</th>
                                        <th class="currency total"></th>
                                    </tr>
                                </tfoot>
                            </table>
                            <table class="table table-general fix min" id="estampillas-table">
                                <thead>
                                    <tr>
                                        <th>Estampillas</th>
                                        <th class="text-end">Valor</th>
                                    </tr>
                                </thead>
                                <tbody data-tramite-field="estampillas"></tbody>
                                <tfoot>
                                    <tr>
                                        <th>Total</th>
                                        <th class="currency total"></th>
                                    </tr>
                                </tfoot>
                            </table>
                            <p>
                                Costo total del tramite: <strong><span data-tramite-field="total"></span></strong> (validos hasta el año 2025)
                            </p>
                        </div>
                        <div class="modal-footer-govco modal-footer-alerts-govco">
                            <div class="modal-buttons-govco d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary btn-modal-govco" style="width: auto; padding: 0 18px !important;">Crear nueva solicitud</button>
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
        const vars = [ 'nombre', 'descripcion'];
        vars.forEach((v, i) => {
            document.querySelector(`[data-tramite-field="${v}"]`).innerHTML = trigger.getAttribute(`data-tramite-${v}`);
        });
        document.querySelector(`[data-tramite-field="id"]`).value = trigger.getAttribute(`data-tramite-id`);

        //estampillas
        const estampillas = JSON.parse(trigger.getAttribute('data-tramite-estampillas')) || [];
        const estampillasTable = document.querySelector(`[data-tramite-field="estampillas"]`).closest('table');
        estampillasTable.style.display = 'table';
        if (estampillas.length){
            let estampillasHtml = '';
            estampillas.forEach((estampilla) => {
                estampillasHtml += `<tr precio="${estampilla.precio}" vehiculo="${estampilla.vehiculo || ''}" persona="${estampilla.persona || ''}">
                    <td>${estampilla.nombre}</td>
                    <td class="currency">${formatCurrency(estampilla.precio)}</td>
                </tr>`;
            });
            document.querySelector(`[data-tramite-field="estampillas"]`).innerHTML = estampillasHtml;
        } else {
            estampillasTable.style.display = 'none';
        }
        //costos
        const costos = JSON.parse(trigger.getAttribute('data-tramite-costos')) || [];
        const costosTable = document.querySelector(`[data-tramite-field="costos"]`).closest('table');
        if (costos.length){
            let costosHtml = '';
            costos.forEach((costo) => {
                costosHtml += `<tr precio="${costo.precio}" vehiculo="${costo.vehiculo || ''}" persona="${costo.persona || ''}">
                    <td>${costo.nombre}</td>
                    <td class="text-end">${formatCurrency(costo.precio)}</td>
                </tr>`;
            });
            document.querySelector(`[data-tramite-field="costos"]`).innerHTML = costosHtml;
        } else {
            document.querySelector(`[data-tramite-field="costos"]`).innerHTML = '<tr><td colspan="2">Sin conceptos</td></tr>';
        }

        //requerimientos
        const requerimientos = JSON.parse(trigger.getAttribute('data-tramite-requerimientos')) || [];
        var target = document.querySelector(`[data-tramite-field="requerimientos"]`);
        target.closest('table').style.display = 'none';
        if (requerimientos.length){
            target.closest('table').style.display = 'table';
            let requerimientosHtml = '';
            requerimientos.forEach((item) => {
                requerimientosHtml += `<tr vehiculo="${item.vehiculo || ''}" persona="${item.persona || ''}">
                    <td>${item.descripcion}</td>
                </tr>`;
            });
            target.innerHTML = requerimientosHtml;
        }
        //vehiculos
        const vehiculos = JSON.parse(trigger.getAttribute('data-tramite-vehiculos')) || [];
        if (vehiculos.length){
            let vehiculosHtml = '';
            vehiculosHtml += `<label for="vehículo" class='mb-1'>Tipo de vehículo</label><br>`;
            vehiculos.forEach((vehiculo, index) => {
                vehiculosHtml += `<label for="vehiculo" class="radio-label-govco me-2">`;
                vehiculosHtml += `<input name="vehiculo" value="${vehiculo.vehiculo}" type="radio" ${index === 0 ? 'checked' : ''}/>`;
                vehiculosHtml += `${vehiculo.vehiculo}</label>`;
            });
            document.querySelector(`[data-tramite-field="vehiculos"]`).innerHTML = vehiculosHtml;
            addVehiculoChangeListener();
            vehiculoSelected({ target: document.querySelector('[name="vehiculo"]:checked') });
        } else {
            document.querySelector(`[data-tramite-field="vehiculos"]`).innerHTML = '<input type="hidden" name="vehiculo" value="TODOS">';
            vehiculoSelected({ target: { value: 'TODOS' } });
        }
        //personas
        const personas = JSON.parse(trigger.getAttribute('data-tramite-personas')) || [];
        if (personas.length){
            let personasHtml = '';
            personasHtml += `<label for="persona" class='mb-1'>Tipo de persona</label><br>`;
            personas.forEach((persona, index) => {
                personasHtml += `<label for="persona" class="radio-label-govco me-2">`;
                personasHtml += `<input name="persona" value="${persona.persona}" type="radio" ${index === 0 ? 'checked' : ''}/>`;
                personasHtml += `${persona.persona}</label>`;
            });
            document.querySelector(`[data-tramite-field="personas"]`).innerHTML = personasHtml;
            addPersonaChangeListener();
            personaSelected({ target: document.querySelector('[name="persona"]:checked') });
        } else {
            document.querySelector(`[data-tramite-field="personas"]`).innerHTML = '<input type="hidden" name="persona" value="TODOS">';
            personaSelected({ target: { value: 'TODOS' } });
        }
    });

    function addVehiculoChangeListener() {
        document.querySelectorAll('[name="vehiculo"]').forEach((vehiculo) => {
            vehiculo.addEventListener('change', vehiculoSelected);
        });
    }
    function addPersonaChangeListener() {
        document.querySelectorAll('[name="persona"]').forEach((persona) => {
            persona.addEventListener('change', personaSelected);
        });
    }

    function vehiculoSelected(event) {
        const vehiculo = event.target;
        const tables = ['requerimientos', 'costos', 'estampillas'];
        tables.forEach((tableId) => {
            const table = document.getElementById(`${tableId}-table`);
            table.querySelectorAll('tbody tr').forEach((req, index) => {
                const reqVehiculo = req.getAttribute('vehiculo') || '';
                if (['TODOS', vehiculo.value].indexOf(reqVehiculo) === -1) {
                    req.style.display = 'none';
                } else {
                    if(document.querySelector('input[name="persona"]:checked')) {
                        const personaSelected = document.querySelector('input[name="persona"]:checked').value;
                        const reqPersona = req.getAttribute('persona') || '';
                        if (['TODOS', personaSelected].indexOf(reqPersona) === -1) {
                            req.style.display = 'none';
                        } else {
                            req.style.display = 'table-row';
                        }
                    }
                    else{
                        req.style.display = 'table-row';
                    }
                }
            });
        });
        calcularTotales();
    }
    function personaSelected(event) {
        const persona = event.target;
        const table = document.getElementById(`requerimientos-table`);
        table.querySelectorAll('tbody tr').forEach((req, index) => {
            const reqPersona = req.getAttribute('persona') || '';
            if (['TODOS', persona.value].indexOf(reqPersona) === -1) {
                req.style.display = 'none';
            } else {
                if(document.querySelector('input[name="vehiculo"]:checked')) {
                    const vehiculoSelected = document.querySelector('input[name="vehiculo"]:checked').value;
                    const reqVehiculo = req.getAttribute('vehiculo') || '';
                    if (['TODOS', vehiculoSelected].indexOf(reqVehiculo) === -1) {
                        req.style.display = 'none';
                    } else {
                        req.style.display = 'table-row';
                    }
                }
                else{
                    req.style.display = 'table-row';
                }
            }
        });
    }

    function calcularTotales(){
        const tables = ['costos', 'estampillas'];
        let tramiteTotal = 0;
        tables.forEach((tableId) => {
            let tableTotal = 0;
            const table = document.getElementById(`${tableId}-table`);
            table.querySelectorAll('tbody tr').forEach((req, index) => {
                if(req.style.display === 'none') {
                    return;
                }
                tableTotal += parseFloat(req.getAttribute('precio')) || 0;

            });
            table.querySelector('tfoot .total').innerHTML = formatCurrency(tableTotal);
            tramiteTotal += tableTotal;
        });
        document.querySelector(`[data-tramite-field="total"]`).innerHTML = formatCurrency(tramiteTotal);
    }

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