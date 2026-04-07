@extends('components.layout')

@section('title', 'Administración de Trámites')

@push('breadcrumb')
<li class="breadcrumb-item-govco active" aria-current="page">Trámites</li>
@endpush

@section('content')

<div class="admin-home mt-2" data-content="natural">
    <div class="row">
        <div class="col-lg-8" id="para-mirar">
            <h3 class="mb-4">Administración de Trámites</h3>
            <div class="row row-cols-xl-3 row-cols-lg-2 row-cols-md-2 g-3">
                @if (Auth::user()->role === 'ADMIN')
                <div class="col p-2">
                    <a class="module-tarjeta-govco fix h-100" href="/solicitudes/pendientes" title="Ver solicitudes pendientes">
                        <div class="header-tarjeta-govco">
                            <h5>Ver solicitudes pendientes</h5>
                        </div>
                        <hr>
                        <div class="body-tarjeta-govco">
                            <p>Consulte las solicitudes pendientes de legalización de documentos.</p>
                        </div>
                    </a>
                </div>
                <div class="col p-2">
                    <a class="module-tarjeta-govco fix h-100" href="/solicitudes/aceptadas" title="Enviar recibo de pago">
                        <div class="header-tarjeta-govco">
                            <h5>Enviar recibo de pago</h5>
                        </div>
                        <hr>
                        <div class="body-tarjeta-govco">
                            <p>Envíe el recibo de pago para completar el trámite de legalización.</p>
                        </div>
                    </a>
                </div>
                <div class="col p-2">
                    <a class="module-tarjeta-govco fix h-100" href="/solicitudes/pagadas" title="Ver recibo de pago">
                        <div class="header-tarjeta-govco">
                            <h5>Ver recibo de pago</h5>
                        </div>
                        <hr>
                        <div class="body-tarjeta-govco">
                            <p>Consulte el recibo de pago de su trámite de legalización.</p>
                        </div>
                    </a>
                </div>
                @endif
                <div class="col p-2">
                    <a class="module-tarjeta-govco fix h-100" href="/solicitudes/completas" title="Enviar certificados">
                        <div class="header-tarjeta-govco">
                            <h5>Ver solicitudes completadas</h5>
                        </div>
                        <hr>
                        <div class="body-tarjeta-govco">
                            <p>Consulte solcitudes con procesos completos y envíe certificados.</p>
                        </div>
                    </a>
                </div>
                @if (Auth::user()->role === 'ADMIN')
                <div class="col p-2">
                    <a class="module-tarjeta-govco fix h-100" href="/solicitudes/rechazadas" title="Ver solicitudes rechazadas">
                        <div class="header-tarjeta-govco">
                            <h5>Ver solicitudes rechazadas</h5>
                        </div>
                        <hr>
                        <div class="body-tarjeta-govco">
                            <p>Consulte las solicitudes rechazadas y sus motivos.</p>
                        </div>
                    </a>
                </div>
                <div class="col p-2">
                    <a class="module-tarjeta-govco fix h-100" href="/tramites/" title="Actualizar trámites">
                        <div class="header-tarjeta-govco">
                            <h5>Administrar trámites</h5>
                        </div>
                        <hr>
                        <div class="body-tarjeta-govco">
                            <p>Habilite, deshabilite y actualice los trámites disponibles en el sistema.</p>
                        </div>
                    </a>
                </div>
                @endif
            </div>
        </div>

        <div class="col-lg-4">
            @include('components.area-servicio')
        </div>

    </div>
</div>

@endsection