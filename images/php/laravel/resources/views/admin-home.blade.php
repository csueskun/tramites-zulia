@extends('components.layout')

@section('title', 'Administración de Trámites')

@push('breadcrumb')
<li class="breadcrumb-item-govco active" aria-current="page">Administración</li>
@endpush

@section('content')

<div class="admin-home mt-2" data-content="natural">
    <div class="row justify-content-between">
        <div class="col-lg-6">
            <h3 class="govcolor-blue-dark mb-4">Administración de Trámites</h3>
            <div class="row">
                <div class="col-lg-4 p-2">
                    <a class="module-tarjeta-govco" href="/solicitudes/pendientes" title="Ver solicitudes pendientes">
                        <div class="header-tarjeta-govco">
                            <h5>Ver solicitudes pendientes</h5>
                        </div>
                        <hr>
                        <div class="body-tarjeta-govco">
                            <p>Consulte las solicitudes pendientes de legalización de documentos.</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 p-2">
                    <a class="module-tarjeta-govco" href="/solicitudes/consolidadas" title="Ver respuestas">
                        <div class="header-tarjeta-govco">
                            <h5>Ver respuestas</h5>
                        </div>
                        <hr>
                        <div class="body-tarjeta-govco">
                            <p>Revise las respuestas a sus solicitudes de legalización de documentos.</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 p-2">
                    <a class="module-tarjeta-govco" href="/solicitudes/aceptadas" title="Enviar recibo de pago">
                        <div class="header-tarjeta-govco">
                            <h5>Enviar recibo de pago</h5>
                        </div>
                        <hr>
                        <div class="body-tarjeta-govco">
                            <p>Envíe el recibo de pago para completar el trámite de legalización.</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 p-2">
                    <a class="module-tarjeta-govco" href="/solicitudes/pagadas" title="Ver recibo de pago">
                        <div class="header-tarjeta-govco">
                            <h5>Ver recibo de pago</h5>
                        </div>
                        <hr>
                        <div class="body-tarjeta-govco">
                            <p>Consulte el recibo de pago de su trámite de legalización.</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 p-2">
                    <a class="module-tarjeta-govco" href="/solicitudes/completas" title="Enviar certificados">
                        <div class="header-tarjeta-govco">
                            <h5>Enviar certificados</h5>
                        </div>
                        <hr>
                        <div class="body-tarjeta-govco">
                            <p>Envíe los certificados necesarios para la legalización de documentos.</p>
                        </div>
                    </a>
                </div>
            </div>

            <h3 class="govcolor-blue-dark my-4">Administración de Usuarios</h3>
            <div class="row">
                <div class="col-lg-4 p-2">
                    <a class="module-tarjeta-govco" href="/usuarios" title="Ver solicitudes pendientes">
                        <div class="header-tarjeta-govco">
                            <h5>Lista de Usuarios</h5>
                        </div>
                        <hr>
                        <div class="body-tarjeta-govco">
                            <p>Consulte la lista de usuarios registrados en el sistema.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            @include('components.area-servicio')
        </div>

    </div>
</div>

@endsection