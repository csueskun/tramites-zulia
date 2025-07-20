@extends('components.layout')

@section('title', 'Mis Solicitudes')

@push('breadcrumb')
<li class="breadcrumb-item-govco active" aria-current="page">Mis Solicitudes</li>
@endpush

@section('content')

<div class="admin-home mt-2" data-content="natural">
    <div class="row justify-content-between">
        <div class="col-lg-9">
            @include('components.session-messages')
            <h3 class="govcolor-blue-dark mb-4">Mis Solicitudes</h3>
            <x-table-options action="/user/solicitudes"/> 
            <div class="container-tabla">
                <table class="table table-general fix" aria-describedby="tableDescCursorRows">
                    <thead class="encabezado-tabla">
                        <tr>
                            <th width="1">Radicado</th>
                            <th width="1">Fecha<br />Solicitud</th>
                            <th>Estado</th>
                            <th width="150">Asunto</th>
                            <!-- <th>Nombres</th>
                            <th width="1">Número<br />documento</th> -->
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="contenido-tablas contenido-hover">
                        @foreach ($solicitudes as $solicitud)
                        <tr>
                            <td>{{$solicitud->radicado}}</td>
                            <td>{{ $solicitud->created_at->format('d/m/Y') }}</td>
                            <td><x-solicitud-estado :solicitud="$solicitud"/></td>
                            <td><span class="max-w350">{{$solicitud->tramite->nombre}}</span></td>
                            <!-- <td>{{$solicitud->usuario->nombre_completo}}</td>
                            <td>{{$solicitud->usuario->documento_completo}}</td> -->
                            <td>
                                <div>
                                    <a class="govco-a" href="/user/solicitudes/{{$solicitud->id}}/ver">VER MÁS</a>
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
                        route="/user/solicitudes" 
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

@endsection
@push('scripts')
<script src="{{ asset('assets/paginacion/paginacion.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        // const estadosPendientes = document.querySelectorAll('.estado-pendiente');
        // estadosPendientes.forEach(estado => {
        //     var estadoSolicitud = estado.getAttribute('data-estado');
        //     const constanciaPago = estado.getAttribute('data-constancia-pago');
        //     const certificado = estado.getAttribute('data-certificado');
        //     var clase = "pendiente";
        //     let estadoNum = 1;

        //     switch (estadoSolicitud) {
        //         case 'EN REVISION':
        //             estadoNum = 2;
        //             estadoSolicitud = "EN REVISIÓN";
        //             break;
        //         case 'APROBADA':
        //             estadoNum = 3;
        //             break;
        //         case 'VALIDADA':
        //             estadoNum = 5;
        //             break;
        //         case 'COMPLETADA':
        //             estadoNum = 5;
        //             clase = "completado";
        //             break;
        //     }

        //     if (estadoNum === 3 && constanciaPago === '1') {
        //         estadoSolicitud = "EN VALIDACIÓN"
        //     }

        //     if (estadoNum === 5 && certificado === '1') {
        //         estadoSolicitud = "COMPLETADA";
        //         clase = "completado";
        //     }

        //     estado.innerHTML = estadoSolicitud;
        //     estado.classList.add(clase);
        // });
    });
</script>

@endpush