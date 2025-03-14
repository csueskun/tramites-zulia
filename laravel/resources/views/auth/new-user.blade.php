@extends('components.layout')

@section('title', 'Crear nuevo usuario')

@push('breadcrumb')
<li class="breadcrumb-item-govco"><a href="/login">Inicio de sesión</a></li>
<li class="breadcrumb-item-govco active" aria-current="page">Nuevo usuario</li>
@endpush

@section('content')

@if (session('success'))
<div class="container-alerta-govco">
    <div class="alert alerta-govco alerta-success-govco asuccess" role="alert">
        <span class="alerta-icon-govco alerta-icon-notificacion-govco asuccess"></span>
        <p class="alerta-content-text">
            {{ session('success') }} <a href="/login" class="alert-link alerta-link asuccess">Iniciar sesión</a>
        </p>
    </div>
</div>
@endif

<div class="new-user-content mt-2" data-content="natural">
    <div class="col-lg-6">
        <h3 class="govcolor-blue-dark">Crear nuevo usuario</h3>
        <div class="container-login-alerta-juridica-govco">
            <div class="icon-informacion-login-govco"></div>
            <p>Para crear un nuevo usuario, por favor completa el siguiente formulario con tu información personal.</p>
        </div>
        <div class="login-label-govco mt-2">
            <p><strong>* Campos obligatorios</strong></p>
        </div>
        <div class="container-login-opcion-govco" data-container-persona="natural">
            <form method="POST" action="/usuarios/nuevo">
                @csrf
                <div class="mt-2">
                    <div class="row">
                        <div class="entradas-de-texto-govco col-lg-12 px-2">
                            <label for="nombres">Nombres*</label>
                            <div class="container-input-texto-govco">
                                <input type="text" name="nombres" id="nombres" placeholder="Ejemplo: Juan" aria-required="true" class="@error('nombres') error @enderror" value="{{ old('nombres') }}">
                                <div class="icon-entradas-de-texto-govco success-icon-entradas-de-texto-govco" aria-label="success" aria-hidden="true"></div>
                                <div class="icon-entradas-de-texto-govco error-icon-entradas-de-texto-govco" aria-label="error" aria-hidden="true"></div>
                            </div>
                            @error('nombres')
                            <span class="error-texto-govco alert-entradas-de-texto-govco" role="alert" aria-live="assertive">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="entradas-de-texto-govco col-lg-12 px-2">
                            <label for="apellidos">Apellidos*</label>
                            <div class="container-input-texto-govco">
                                <input type="text" name="apellidos" id="apellidos" placeholder="Ejemplo: Pérez" aria-required="true" class="@error('apellidos') error @enderror" value="{{ old('apellidos') }}">
                                <div class="icon-entradas-de-texto-govco success-icon-entradas-de-texto-govco" aria-label="success" aria-hidden="true"></div>
                                <div class="icon-entradas-de-texto-govco error-icon-entradas-de-texto-govco" aria-label="error" aria-hidden="true"></div>
                            </div>
                            @error('apellidos')
                            <span class="error-texto-govco alert-entradas-de-texto-govco" role="alert" aria-live="assertive">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="entradas-de-texto-govco col-lg-6 px-2">
                            <label for="tipo_documento" class="label-desplegable-govco">Tipo de documento<span aria-required="true">*</span></label>
                            <div class="desplegable-govco @error('tipo_documento') error-desplegable-govco @enderror" id="lista-desplegables" data-type="basic">
                                <select aria-invalid="false" aria-describedby="alert-id" name="tipo_documento" id="tipo_documento">
                                    <option disabled selected>Escoger</option>
                                    <option value="CC">Cédula de ciudadanía</option>
                                    <option value="CE">Cédula de extranjería</option>
                                    <option value="PA">Pasaporte</option>
                                    <option value="RC">Registro civil</option>
                                    <option value="TI">Tarjeta de identidad</option>
                                </select>
                            </div>
                            @error('tipo_documento')
                            <span class="error-texto-govco alert-entradas-de-texto-govco" role="alert" aria-live="assertive">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="entradas-de-texto-govco col-lg-6 px-2">
                            <label for="documento">Documento*</label>
                            <div class="container-input-texto-govco">
                                <input type="text" name="documento" id="documento" placeholder="Ejemplo: 1234567890" aria-required="true" class="@error('documento') error @enderror" value="{{ old('documento') }}">
                                <div class="icon-entradas-de-texto-govco success-icon-entradas-de-texto-govco" aria-label="success" aria-hidden="true"></div>
                                <div class="icon-entradas-de-texto-govco error-icon-entradas-de-texto-govco" aria-label="error" aria-hidden="true"></div>
                            </div>
                            @error('documento')
                            <span class="error-texto-govco alert-entradas-de-texto-govco" role="alert" aria-live="assertive">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="entradas-de-texto-govco px-2">
                            <label for="email">Correo electrónico*</label>
                            <div class="container-input-texto-govco">
                                <input type="email" name="email" id="email" placeholder="Ejemplo: correo@email.com" aria-required="true" class="@error('email') error @enderror" value="{{ old('email') }}">
                                <div class="icon-entradas-de-texto-govco success-icon-entradas-de-texto-govco" aria-label="success" aria-hidden="true"></div>
                                <div class="icon-entradas-de-texto-govco error-icon-entradas-de-texto-govco" aria-label="error" aria-hidden="true"></div>
                            </div>
                            @error('email')
                            <span class="error-texto-govco alert-entradas-de-texto-govco" role="alert" aria-live="assertive">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="entradas-de-texto-govco col-lg-6 px-2">
                            <label for="password">Contraseña*</label>
                            <div class="container-input-texto-govco">
                                <input type="password" name="password" id="password" placeholder="Ejemplo: ********" aria-required="true" maxlength="20" class="@error('password') error @enderror">
                                <div class="icon-entradas-de-texto-govco success-icon-entradas-de-texto-govco" aria-label="success" aria-hidden="true"></div>
                                <div class="icon-entradas-de-texto-govco error-icon-entradas-de-texto-govco" aria-label="error" aria-hidden="true"></div>
                            </div>
                            @error('password')
                            <span class="error-texto-govco alert-entradas-de-texto-govco" role="alert" aria-live="assertive">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="entradas-de-texto-govco col-lg-6 px-2">
                            <label for="password_confirmation">Confirmar Contraseña*</label>
                            <div class="container-input-texto-govco">
                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Ejemplo: ********" aria-required="true" maxlength="20" class="@error('password') error @enderror">
                                <div class="icon-entradas-de-texto-govco success-icon-entradas-de-texto-govco" aria-label="success" aria-hidden="true"></div>
                                <div class="icon-entradas-de-texto-govco error-icon-entradas-de-texto-govco" aria-label="error" aria-hidden="true"></div>
                            </div>
                            @error('password')
                            <span class="error-texto-govco alert-entradas-de-texto-govco" role="alert" aria-live="assertive">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn-govco fill-btn-govco" name="continuar"
                        style="width: 165px; height: 42px;">Guardar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-6"></div>
</div>

@endsection