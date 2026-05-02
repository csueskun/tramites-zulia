@extends('components.layout')

@section('title', '500 - Error interno del servidor')

@push('breadcrumb')
    <li class="breadcrumb-item-govco active" aria-current="page">Error 500</li>
@endpush

@section('content')
    <div class="new-user-content mt-2">
        <div class="row justify-content-between">
            <div class="col-lg-8">
                <h3 class="">500 - Error interno del servidor</h3>
                <div class="container-login-alerta-juridica-govco">
                    <div class="icon-informacion-login-govco"></div>
                </div>
                <div class="container-login-opcion-govco mt-4">
                    <p>
                        Ha ocurrido un error inesperado en el servidor. Estamos trabajando para solucionarlo lo antes posible. Por favor, intente nuevamente más tarde.
                    </p>
                    <div class="mt-4">
                        <a href="{{ url('/') }}" class="btn-govco fill-btn-govco" style="width: fit-content; display: inline-block;">Volver al inicio</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                @include('components.area-servicio')
            </div>
        </div>
    </div>
@endsection
