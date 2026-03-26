@extends('components.layout')

@section('title', 'Recuperar contraseña')

@push('breadcrumb')
<li class="breadcrumb-item-govco"><a href="/login">Inicio de sesión</a></li>
<li class="breadcrumb-item-govco active" aria-current="page">Recuperar contraseña</li>
@endpush

@section('content')


<div class="new-user-content mt-2" data-content="natural">
    <div class="col-lg-6">
        @if (session('success'))
        <div class="container-alerta-govco">
            <div class="alert alerta-govco alerta-success-govco asuccess" role="alert">
                <span class="alerta-icon-govco alerta-icon-notificacion-govco asuccess"></span>
                <p class="alerta-content-text">
                    {{ session('success') }}
                </p>
            </div>
        </div>
        <br>
        @endif
        <h1 class="">Restablecer contraseña</h1>
        <div class="container-login-alerta-juridica-govco">
            <div class="icon-informacion-login-govco"></div>
        </div>
        <div class="container-login-opcion-govco">
            <form method="POST" action="/forgot-password">
                @csrf
                <div class="mt-2">
                    <div class="row">
                        <div class="entradas-de-texto-govco col-lg-12 px-2">
                            <label for="email">Por favor escriba su correo electrónico para recibir un enlace de restablecimiento de contraseña:</label>
                            <div class="container-input-texto-govco">
                                <input required type="email" name="email" id="email" aria-required="true" class="@error('email') error @enderror" value="{{ old('email') }}">
                                <div class="icon-entradas-de-texto-govco success-icon-entradas-de-texto-govco" aria-label="success" aria-hidden="true"></div>
                                <div class="icon-entradas-de-texto-govco error-icon-entradas-de-texto-govco" aria-label="error" aria-hidden="true"></div>
                            </div>
                            @error('email')
                            <span class="error-texto-govco alert-entradas-de-texto-govco" role="alert" aria-live="assertive">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn-govco fill-btn-govco" name="continuar"
                        style="height: 42px;">Enviar
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-6"></div>
</div>

@endsection