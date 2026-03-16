@extends('components.layout')

@section('title', 'Trámites')

@push('breadcrumb')
    <li class="breadcrumb-item-govco" aria-current="page"><a href="/home">Trámites</a></li>
    <li class="breadcrumb-item-govco" aria-current="page"><a href="/tramites">Administración</a></li>
    <li class="breadcrumb-item-govco active" aria-current="page">{{ $tramite->nombre }}</li>
@endpush

@section('content')

    <div class="admin-home mt-2" data-content="natural">
        <div class="row justify-content-between">
            <div class="col-lg-8">
                @include('components.session-messages')
                <h3 class="mb-4">{{ $tramite->nombre }}</h3>
                <form method="post" action="/tramites/{{ $tramite->id }}" id="new-user-form">
                    @csrf
                    @method('patch')
                    <div class="mt-2">
                        <div class="row">
                            <div class="entradas-de-texto-govco col-lg-12 px-2">
                                <label for="nombre">Nombres*</label>
                                <div class="container-input-texto-govco">
                                    <input typeData="onlyText" type="text" required name="nombre" id="nombre"
                                        aria-required="true" class="@error('nombre') error @enderror"
                                        value="{{ old('nombre') ?? $tramite->nombre }}">
                                    <div class="icon-entradas-de-texto-govco success-icon-entradas-de-texto-govco"
                                        aria-label="success" aria-hidden="true"></div>
                                    <div class="icon-entradas-de-texto-govco error-icon-entradas-de-texto-govco"
                                        aria-label="error" aria-hidden="true"></div>
                                </div>
                                @error('nombre')
                                    <span class="error-texto-govco alert-entradas-de-texto-govco" role="alert"
                                        aria-live="assertive">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="entradas-de-texto-govco col-lg-12 px-2">
                                <label for="descripcion">Descripción*</label>
                                <div class="container-input-texto-govco">
                                    <textarea typeData="onlyText" type="text" required name="descripcion" id="descripcion"
                                        aria-required="true"
                                        class="aservice-comentarios-textarea @error('descripcion') error @enderror"
                                        style="width: 100%; height: 100px;">{{ old('descripcion') ?? $tramite->descripcion }}</textarea>
                                    <div class="icon-entradas-de-texto-govco success-icon-entradas-de-texto-govco"
                                        aria-label="success" aria-hidden="true"></div>
                                    <div class="icon-entradas-de-texto-govco error-icon-entradas-de-texto-govco"
                                        aria-label="error" aria-hidden="true"></div>
                                </div>
                                @error('descripcion')
                                    <span class="error-texto-govco alert-entradas-de-texto-govco" role="alert"
                                        aria-live="assertive">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn-govco fill-btn-govco" name="continuar"
                            style="width: 165px; height: 42px;">Guardar</button>
                    </div>
                </form>
                <h4 class="mt-4 ">Estampillas</h4>
                <div class="container-tabla">
                    <table class="table table-general fix min" aria-describedby="tableDescCursorRows">
                        <thead class="encabezado-tabla">
                            <tr>
                                <th style="width: 100% !important">Nombre</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="contenido-tablas contenido-hover">
                            @foreach ($tramite->items as $item)
                                @php
                                    if ($item->tipo != 'ESTAMPILLA') {
                                        continue;
                                    }
                                    $nombre = $item->nombre . ($item->vehiculo != 'TODOS' ? " ($item->vehiculo)" : "") . ($item->persona != 'TODOS' ? " ($item->persona)" : "");
                                @endphp
                                <tr>
                                    <td>{{ $nombre }}</td>
                                    <td class="no-wrap currency">$ {{ number_format($item->precio, 0, ',', '.') }}</td>
                                    <td>
                                        <a class="govco-a" href="#" data-bs-toggle="modal" data-bs-id="{{ $item->id }}"
                                            data-bs-nombre="{{ $nombre }}"
                                            data-bs-precio="{{ number_format($item->precio, 0, '', '') }}"
                                            data-bs-action="/tramite_items/{{ $item->id }}" data-bs-target="#editar-modal">
                                            EDITAR_PRECIO</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <h4 class="mt-4 ">Costos</h4>
                <div class="container-tabla">
                    <table class="table table-general fix min" aria-describedby="tableDescCursorRows">
                        <thead class="encabezado-tabla">
                            <tr>
                                <th style="width: 100% !important">Nombre</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="contenido-tablas contenido-hover">
                            @foreach ($tramite->items as $item)
                                @php
                                    if ($item->tipo != 'COSTO') {
                                        continue;
                                    }
                                    $nombre = $item->nombre . ($item->vehiculo != 'TODOS' ? " ($item->vehiculo)" : "") . ($item->persona != 'TODOS' ? " ($item->persona)" : "");
                                @endphp
                                <tr>
                                    <td>{{ $nombre }}</td>
                                    <td class="no-wrap currency">$ {{ number_format($item->precio, 0, ',', '.') }}</td>
                                    <td>
                                        <a class="govco-a" href="#" data-bs-toggle="modal" data-bs-id="{{ $item->id }}"
                                            data-bs-nombre="{{ $nombre }}"
                                            data-bs-precio="{{ number_format($item->precio, 0, '', '') }}"
                                            data-bs-action="/tramite_items/{{ $item->id }}" data-bs-target="#editar-modal">
                                            EDITAR_PRECIO</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="col-lg-3">
                @include('components.area-servicio')
            </div>

        </div>
    </div>

    <div class="modal fade" id="editar-modal" role="dialog" aria-labelledby="mdWarningLabel" aria-hidden="true">
        <div class="container-modal-govco">
            <div class="modal-container-govco" id="exampleModalWarning" tabindex="-1" data-bs-backdrop="false"
                data-bs-keyboard="false" aria-labelledby="exampleModalAdvertencia" aria-hidden="true" aria-hidden="true"
                role="dialog">
                <div class="modal-dialog modal-dialog-govco">
                    <div class="modal-content modal-content-govco" style="font-size: 0.9em">
                        <div class="modal-body modal-body-govco" style="margin: 12px 40px !important">
                            <h4 class="" data-content></h4>
                            <form method="post" action="" id="update-form">
                                @csrf
                                @method('patch')
                                <div class="row">
                                    <div class="entradas-de-texto-govco col-lg-12 px-2">
                                        <label for="nombre">Precio Anterior*</label>
                                        <span data-content></span>
                                        <label class="mt-3" for="nombre">Precio Nuevo*</label>
                                        <div class="container-input-texto-govco">
                                            <div class="input-group">
                                                <span class="input-group-text" style="height: 40px;">$</span>
                                                <input data-content typeData="onlyNumber" type="text" required name="precio"
                                                    id="precio" aria-required="true"
                                                    class="@error('precio') error @enderror" value="" style="width: auto;">
                                            </div>
                                            <div class="icon-entradas-de-texto-govco success-icon-entradas-de-texto-govco"
                                                aria-label="success" aria-hidden="true"></div>
                                            <div class="icon-entradas-de-texto-govco error-icon-entradas-de-texto-govco"
                                                aria-label="error" aria-hidden="true"></div>
                                        </div>
                                        @error('precio')
                                            <span class="error-texto-govco alert-entradas-de-texto-govco" role="alert"
                                                aria-live="assertive">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer-govco modal-footer-alerts-govco">
                            <div class="modal-buttons-govco d-flex justify-space-between">
                                <button type="button" class="btn-govco fill-btn-govco fit-content btn-contorno"
                                    data-bs-dismiss="modal">
                                    Cerrar
                                </button>
                                <button onclick="preSubmit()" type="button" class="btn-govco fill-btn-govco"
                                    name="continuar" style="width: 165px; height: 42px;">Guardar</button>
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
        var verMas = document.getElementById('editar-modal');
        verMas.addEventListener('show.bs.modal', function (event) {
            var trigger = event.relatedTarget;
            var fields = verMas.querySelectorAll('[data-content]');
            fields[0].innerHTML = trigger.getAttribute('data-bs-nombre');
            const precio = trigger.getAttribute('data-bs-precio');
            fields[1].innerHTML = formatCurrency(precio);
            fields[2].value = precio;
            document.getElementById('update-form').setAttribute('action', trigger.getAttribute('data-bs-action'));
        });
        document.addEventListener('DOMContentLoaded', function () {
            const precioInput = document.querySelectorAll('input[typeData="onlyNumber"]');
            methodAssign("keyup", onlyNumberValidator, precioInput);
        });
        function preSubmit() {
            const form = document.getElementById('update-form');
            const isValid = validateForm(form);
            if (!isValid) {
                event.preventDefault();
            }
            else {
                form.submit();
            }
        }
    </script>
@endpush