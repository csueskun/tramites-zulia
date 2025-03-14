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
                                        <li class="nav-item h100">
                                            <a class="pestana-opcion active focus nav-link h100" href="javascript:void(0)" onclick="showPanel(0)">
                                                <div class="linea-vertical-govco active" id="hrvuno">
                                                    <div class="row campo-texto-pestana-govco">
                                                        <div class="col-10 col-md-10 col-lg-10 ">
                                                            <p id="letrapest1">
                                                                Traspaso de propiedad de un vehículo automotor
                                                            </p>
                                                        </div>
                                                        <div class="col-2 col-md-2 col-lg-2">
                                                            <p id="PrimeraPestana" class="icon_right">
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item h120">
                                            <a class="pestana-opcion nav-link h120" href="javascript:void(0)" onclick="showPanel(1)">
                                                <div class="linea-vertical-govco" id="hrvdos">
                                                    <div class="row campo-texto-pestana-govco">
                                                        <div class="col-10 col-md-10 col-lg-10 ">
                                                            <p id="letrapest1">
                                                                Levantamiento de limitacion o gravamen a un vehículo automotor
                                                            </p>
                                                        </div>
                                                        <div class="col-2 col-md-2 col-lg-2">
                                                            <p id="SegundaPestana" class="icon_right">
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item h100">
                                            <a class="pestana-opcion nav-link h100" href="javascript:void(0)" onclick="showPanel(2)">
                                                <div class="linea-vertical-govco" id="hrvdos">
                                                    <div class="row campo-texto-pestana-govco">
                                                        <div class="col-10 col-md-10 col-lg-10 ">
                                                            <p id="letrapest1">
                                                                Certificado de libertad y tradicion de un vehículo automotor
                                                            </p>
                                                        </div>
                                                        <div class="col-2 col-md-2 col-lg-2">
                                                            <p id="TerceraPestana" class="icon_right">
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item h100">
                                            <a class="pestana-opcion nav-link h100" href="javascript:void(0)" onclick="showPanel(3)">
                                                <div class="linea-vertical-govco" id="hrvdos">
                                                    <div class="row campo-texto-pestana-govco">
                                                        <div class="col-10 col-md-10 col-lg-10 ">
                                                            <p id="letrapest1">
                                                                Duplicado de placas de un vehículo automotor
                                                            </p>
                                                        </div>
                                                        <div class="col-2 col-md-2 col-lg-2">
                                                            <p id="CuartaPestana" class="icon_right">
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item h100">
                                            <a class="pestana-opcion nav-link h100" href="javascript:void(0)" onclick="showPanel(4)">
                                                <div class="linea-vertical-govco" id="hrvdos">
                                                    <div class="row campo-texto-pestana-govco">
                                                        <div class="col-10 col-md-10 col-lg-10 ">
                                                            <p id="letrapest1">
                                                                Renovación de licencia de conducción
                                                            </p>
                                                        </div>
                                                        <div class="col-2 col-md-2 col-lg-2">
                                                            <p id="CuartaPestana" class="icon_right">
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-8 ps-4">
                    <div class="pestana-content active">
                        <h4 class="govcolor-blue-dark mb-4">
                            Traspaso de propiedad de un vehículo automotor
                        </h4>
                        <p>
                            Este trámite asegura que el nuevo propietario sea reconocido
                            como el responsable legal del vehículo, cumpliendo con las
                            obligaciones civiles y fiscales, como el pago de impuestos,
                            multas y otros compromisos asociados al automóvil.
                        </p>
                        <p>
                            Costo total del tramite: <strong>$225.000</strong> (validos hasta el año 2025)
                        </p>
                        <p>
                            <strong>Cuentas a Depositar:</strong>
                            cuenta de ahorros <strong>BANCO BOGOTA - 260612163</strong>
                        </p>
                        <p>
                        <table class="table table-general fix">
                            <thead>
                                <tr>
                                    <th>Concepto a pagar</th>
                                    <th class="text-end">Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Derecho de trámite</td>
                                    <td class="text-end">$160.200</td>
                                </tr>
                                <tr>
                                    <td>Sustrato lamina</td>
                                    <td class="text-end">$25.000</td>
                                </tr>
                                <tr>
                                    <td>MT</td>
                                    <td class="text-end">$34.900</td>
                                </tr>
                                <tr>
                                    <td>RUNT</td>
                                    <td class="text-end">$4.900</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total</th>
                                    <th class="text-end">$225.000</th>
                                </tr>
                            </tfoot>
                        </table>
                        </p>
                        <p>
                            <a href="/user/solicitudes/nueva-TPVA">
                                <button type="button" class="btn-govco fill-btn-govco">Crear nueva solicitud</button>
                            </a>
                        </p>
                    </div>
                    <div class="pestana-content">
                        <h4 class="govcolor-blue-dark mb-4">
                            Levantamiento de limitacion o gravamen a un vehículo automotor
                        </h4>
                        <p>
                            El proceso legal mediante el cual se elimina una restricción,
                            impedimento o condición que afecta la libre disposición del vehículo.
                            Este gravamen puede haber sido impuesto por diversas razones, y su
                            levantamiento permite que el propietario del vehículo lo venda, transfiera
                            o disponga de él sin restricciones legales.
                        </p>
                        <p>
                            Costo total del tramite: <strong>$133.804</strong> (validos hasta el año 2025)
                        </p>
                        <p>
                            <strong>Cuentas a Depositar:</strong>
                            cuenta de ahorros <strong>BANCO BOGOTA - 260612163</strong>
                        </p>
                        <p>
                        <table class="table table-general fix">
                            <thead>
                                <tr>
                                    <th>Concepto a pagar</th>
                                    <th class="text-end">Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Derecho de trámite</td>
                                    <td class="text-end">$68.404</td>
                                </tr>
                                <tr>
                                    <td>Sustrato lamina</td>
                                    <td class="text-end">$25.000</td>
                                </tr>
                                <tr>
                                    <td>MT</td>
                                    <td class="text-end">$32.600</td>
                                </tr>
                                <tr>
                                    <td>RUNT</td>
                                    <td class="text-end">$7.800</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total</th>
                                    <th class="text-end">$133.804</th>
                                </tr>
                            </tfoot>
                        </table>
                        </p>
                        <p>
                            <a href="/user/solicitudes/nueva-LLGVA">
                                <button type="button" class="btn-govco fill-btn-govco">Crear nueva solicitud</button>
                            </a>
                        </p>
                    </div>
                    <div class="pestana-content">
                        <h4 class="govcolor-blue-dark mb-4">
                            Certificado de libertad y tradicion de un vehículo automotor
                        </h4>
                        <p>
                            El certificado de libertad y tradicion de un vehiculo automotor
                            incluye la información como su historial de propietarios,
                            estado de los impuestos, posibles embargos, u otras restricciones
                            legales que puedan afectar a la propiedad.
                        </p>
                        <p>
                            Costo total del tramite: <strong>$60.000</strong> (validos hasta el año 2025)
                        </p>
                        <p>
                            <strong>Cuentas a Depositar:</strong>
                            cuenta de ahorros <strong>BANCO BOGOTA - 260612163</strong>
                        </p>
                        <p>
                        <table class="table table-general fix">
                            <thead>
                                <tr>
                                    <th>Concepto a pagar</th>
                                    <th class="text-end">Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Derecho de tramite</td>
                                    <td class="text-end">$60.000</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total</th>
                                    <th class="text-end">$60.000</th>
                                </tr>
                            </tfoot>
                        </table>
                        </p>
                        <p>
                            <a href="/user/solicitudes/nueva-CLTVA">
                                <button type="button" class="btn-govco fill-btn-govco">Crear nueva solicitud</button>
                            </a>
                        </p>
                    </div>
                    <div class="pestana-content">
                        <h4 class="govcolor-blue-dark mb-4">
                            Duplicado de placas de un vehículo automotor
                        </h4>
                        <p>
                            Destrucción, deterioro o hurto, las cuales permiten
                            identificar externa y privativamente un vehículo.
                        </p>
                        <p>
                            Costo total del tramite: <strong>$118.305</strong> (validos hasta el año 2025)
                        </p>
                        <p>
                            <strong>Cuentas a Depositar:</strong>
                            cuenta de ahorros <strong>BANCO BOGOTA - 260612163</strong>
                        </p>
                        <p>
                        <table class="table table-general fix">
                            <thead>
                                <tr>
                                    <th>Concepto a pagar</th>
                                    <th class="text-end">Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Derecho de trámite</td>
                                    <td class="text-end">$91.205</td>
                                </tr>
                                <tr>
                                    <td>Sustrato lamina</td>
                                    <td class="text-end">$25.000</td>
                                </tr>
                                <tr>
                                    <td>MT</td>
                                    <td class="text-end">$0</td>
                                </tr>
                                <tr>
                                    <td>RUNT</td>
                                    <td class="text-end">$2.100</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total</th>
                                    <th class="text-end">$118.305</th>
                                </tr>
                            </tfoot>
                        </table>
                        </p>
                        <p>
                            <a href="/user/solicitudes/nueva-DPVA">
                                <button type="button" class="btn-govco fill-btn-govco">Crear nueva solicitud</button>
                            </a>
                        </p>
                    </div>
                    <div class="pestana-content">
                        <h4 class="govcolor-blue-dark mb-4">
                            Renovación de licencia de conducción
                        </h4>
                        <p>
                            Este proceso permite actualizar la vigencia del documento,
                            certificando que la persona sigue apta para conducir un
                            vehículo al cumplir con las normativas de tránsito,
                            mantener las habilidades necesarias y/o contar con
                            condiciones médicas adecuadas según los requisitos
                            establecidos.
                        </p>
                        <p>
                            Costo total del tramite: <strong>$82.502</strong> (validos hasta el año 2025)
                        </p>
                        <p>
                            <strong>Cuentas a Depositar:</strong>
                            cuenta de ahorros <strong>BANCO BOGOTA - 260612163</strong>
                        </p>
                        <p>
                        <table class="table table-general fix">
                            <thead>
                                <tr>
                                    <th>Concepto a pagar</th>
                                    <th class="text-end">Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Derecho de trámite</td>
                                    <td class="text-end">$22.802</td>
                                </tr>
                                <tr>
                                    <td>Sustrato lamina</td>
                                    <td class="text-end">$25.000</td>
                                </tr>
                                <tr>
                                    <td>MT</td>
                                    <td class="text-end">$32.600</td>
                                </tr>
                                <tr>
                                    <td>RUNT</td>
                                    <td class="text-end">$2.100</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total</th>
                                    <th class="text-end">$82.502</th>
                                </tr>
                            </tfoot>
                        </table>
                        </p>
                        <p>
                            <a href="/user/solicitudes/nueva-RLC">
                                <button type="button" class="btn-govco fill-btn-govco">Crear nueva solicitud</button>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            @include('components.area-servicio')
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