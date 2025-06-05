@extends('components.layout')

@section('title', 'Usuarios Registrados')

@push('breadcrumb')
<li class="breadcrumb-item-govco" aria-current="page"><a href="/">Administración</a></li>
<li class="breadcrumb-item-govco active" aria-current="page">Usuarios Registrados</li>
@endpush

@section('content')

<div class="admin-home mt-2" data-content="natural">
    <div class="row justify-content-between">
        <div class="col-lg-9">
            @include('components.session-messages')
            <h3 class="govcolor-blue-dark mb-4">Usuarios Registrados</h3>
            <div class="container-tabla">
                <table class="table table-general fix" aria-describedby="tableDescCursorRows">
                    <thead class="encabezado-tabla">
                        <tr>
                            <th>Nombres</th>
                            <th>Rol</th>
                            <th>Documento</th>
                            <th>Correo electrónico</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="contenido-tablas contenido-hover">
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->nombreCompleto }}</td>
                            <td>
                                @if ($user->role == 'ADMIN')
                                    <span class="etiqueta-govco pendiente">ADMINISTRADOR</span>
                                @elseif ($user->role == 'USER')
                                    <span class="etiqueta-govco completado">USUARIO</span>
                                @endif
                            </td>
                            <td>{{ $user->documentoCompleto }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="acciones">
                                @if ($user->role == 'USER')
                                <form action="/usuarios/{{$user->id}}" method="post">
                                    @csrf
                                    @method('patch')
                                    <input type="hidden" name="role" value="ADMIN">
                                    <button type="submit" class="btn-to-govco-a govco-a">VOLVER ADMIN</button>
                                </form>/
                                @endif
                                <a class="govco-a" href="/" data-bs-toggle="modal" data-bs-target="#eliminar-modal"
                                    data-bs-usuario-id="{{ $user->id }}">
                                    ELIMINAR</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <div class="pagination-container-govco">
                <nav class="nav-pagination-govco" aria-label="paginador de ejemplo">
                    <div class="pagination-govco" id="paginationExample" total="{{$users->lastPage()}}" initialpage="{{$users->currentPage()}}">
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

<div class="modal fade" id="eliminar-modal" role="dialog" aria-labelledby="mdWarningLabel" aria-hidden="true">
    <div class="container-modal-govco">
        <div class="modal-container-govco" id="exampleModalWarning" tabindex="-1" data-bs-backdrop="false"
            data-bs-keyboard="false" aria-labelledby="exampleModalAdvertencia" aria-hidden="true" aria-hidden="true"
            role="dialog">
            <div class="modal-dialog modal-dialog-govco">
                <form action="" method="post">
                    @csrf
                    @method('delete')
                    <div class="modal-content modal-content-govco">
                        <div class="modal-header modal-header-govco modal-header-alerts-govco">
                            <button type="button" disabled class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body modal-body-govco" style="margin: 12px 40px !important">
                            <div class="modal-icon center-elements-govco">
                                <span class="modal-icon-govco modal-warning-icon"></span>
                            </div>
                            <p class="modal-title modal-title-govco text-center">
                                ¿Está seguro de eliminar este usuario?
                            </p>
                            <p class="text-center">Esta acción no se puede deshacer.</p>
                        </div>
                        <div class="modal-footer-govco modal-footer-alerts-govco">
                            <div class="modal-buttons-govco d-flex justify-space-between">
                                <button type="submit" class="btn btn-primary btn-modal-govco" data-bs-dismiss="modal">
                                    Elminar
                                </button>
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
<script src="{{ asset('assets/paginacion/paginacion.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('eliminar-modal').addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var userId = button.getAttribute('data-bs-usuario-id');
            var form = this.querySelector('#eliminar-modal form');
            form.action = '/usuarios/' + userId;
        });
    });
</script>
@endpush