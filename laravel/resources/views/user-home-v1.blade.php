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

                <div class="col-lg-4">

                    <div class="container-navbar-pestana-vertical-govco blue-pestana-govco">
                        <nav class="fix navbar-expand-lg navbar-pestana-vertical-govco">
                            <div class="container-fluid">
                                <div class="navbar-collapse">
                                    <ul class="navbar-expand-lg" style="list-style:none;">
                                        @foreach ($tramites as $index => $tramite)
                                        <li class="nav-item h100">
                                            <a class="pestana-opcion @if ($index == 0) active focus @endif nav-link h100" href="javascript:void(0)" onclick="showPanel({{ $index }})">
                                                <div class="linea-vertical-govco active" id="hr{{ $index }}">
                                                    <div class="row campo-texto-pestana-govco">
                                                        <div class="col-10 col-md-10 col-lg-10 ">
                                                            <p id="letrapest1">
                                                                {{ $tramite->nombre }}
                                                            </p>
                                                        </div>
                                                        <div class="col-2 col-md-2 col-lg-2">
                                                            <p id="Pestana{{ $tramite->id }}" class="icon_right">
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-8 ps-4">
                    @foreach ($tramites as $index => $tramite)
                    <div class="pestana-content @if ($index == 0) active @endif">
                        <h4 class="govcolor-blue-dark mb-4">
                            {{ $tramite->nombre }}
                        </h4>
                        <p>
                            {{ $tramite->descripcion }}
                        </p>
                        <p>
                            Costo total del tramite: <strong>${{ number_format($tramite->precio, 0) }}</strong> (validos hasta el año 2025)
                        </p>
                        <p>
                            <strong>Cuentas a Depositar:</strong>
                            cuenta de ahorros <strong>BANCO BOGOTA - 260612163</strong>
                        </p>
                        <table class="table table-general fix">
                            <thead>
                                <tr>
                                    <th>Concepto a pagar</th>
                                    <th class="text-end">Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tramite->items as $item)
                                <tr>
                                    <td>{{ $item->nombre }}</td>
                                    <td class="text-end">${{ number_format($item->precio, 0) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total</th>
                                    <th class="text-end">${{ number_format($tramite->precio, 0) }}</th>
                                </tr>
                            </tfoot>
                        </table>
                        <p>
                            <a href="/user/solicitudes/nueva-T{{ $tramite->id }}">
                                <button type="button" class="btn-govco fill-btn-govco">Crear nueva solicitud</button>
                            </a>
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            @include('components.area-servicio')
        </div>

    </div>
</div>
@endsection
<style>
    .pestana-content {
        display: block;
    }

    .pestana-content:not(.active) {
        display: none;
    }
</style>
@push('scripts')
<script>
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