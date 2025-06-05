@extends('components.layout')

@section('title', 'Crear nuevo usuario')

@push('breadcrumb')
<li class="breadcrumb-item-govco"><a href="/login">Inicio de sesión</a></li>
<li class="breadcrumb-item-govco active" aria-current="page">Verificar correo</li>
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
        <h3 class="govcolor-blue-dark">Verificar correo</h3>
        <div class="container-login-alerta-juridica-govco">
            <div class="icon-informacion-login-govco"></div>
        </div>
        <div class="container-login-opcion-govco" data-container-persona="natural">
            <form method="POST" action="/usuarios/verificar">
                @csrf
                <input type="hidden" name="email" value="{{ old('email') }}">
                <div class="mt-2">
                    <div class="row">
                        <div class="entradas-de-texto-govco col-lg-12 px-2">
                            <label for="verification_code">Código de verificación *</label>
                            <div class="container-input-texto-govco">
                                <input required type="text" name="verification_code" id="verification_code" aria-required="true" class="@error('verification_code') error @enderror" value="{{ old('verification_code') }}">
                                <div class="icon-entradas-de-texto-govco success-icon-entradas-de-texto-govco" aria-label="success" aria-hidden="true"></div>
                                <div class="icon-entradas-de-texto-govco error-icon-entradas-de-texto-govco" aria-label="error" aria-hidden="true"></div>
                            </div>
                            @error('verification_code')
                            <span class="error-texto-govco alert-entradas-de-texto-govco" role="alert" aria-live="assertive">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn-govco fill-btn-govco" name="continuar"
                        style="height: 42px;">Verificar
                    </button>
                    <span class="etiqueta-govco pendiente" id="counter">
                        Puede solicitar un nuevo código de verificación en 30 segundos
                    </span>
                    <button type="button" class="btn-govco fill-btn-govco wait-for-counter" name="continuar"
                        onclick="document.getElementById('resend').submit();" style="height: 42px;">Reenviar código de verificación
                    </button>
                </div>
            </form>
            <form id="resend" method="POST" action="/usuarios/reenviar-verificacion">
                @csrf
                <input type="hidden" name="email" value="{{ old('email') }}">
            </form>
            <form method="POST" action="/usuarios/reenviar-verificacion" class="wait-for-counter">
                @csrf
                <input type="hidden" name="email" value="{{ old('email') }}">
                <div class="row">
                    <div class="entradas-de-texto-govco col-lg-12 px-2">
                        <label for="email_alternativo">Si desea recibir el código de verificación en otra dirección de correo electrónico, por favor ingréselo a continuación:</label>
                        <label for="email_alternativo">Correo alternativo *</label>
                        <div class="container-input-texto-govco">
                            <input required type="email" name="email_alternativo" id="email_alternativo" aria-required="true" class="@error('email_alternativo') error @enderror" value="{{ old('email_alternativo') }}">
                            <div class="icon-entradas-de-texto-govco success-icon-entradas-de-texto-govco" aria-label="success" aria-hidden="true"></div>
                            <div class="icon-entradas-de-texto-govco error-icon-entradas-de-texto-govco" aria-label="error" aria-hidden="true"></div>
                        </div>
                        @error('email_alternativo')
                        <span class="error-texto-govco alert-entradas-de-texto-govco" role="alert" aria-live="assertive">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn-govco fill-btn-govco" name="continuar"
                    style="height: 42px;">Enviar código de verificación al correo alternativo
                </button>
            </form>
        </div>
    </div>
    <div class="col-lg-6"></div>
</div>

@endsection
<style>
    .wait-for-counter{
        display: none;
    }
</style>
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let counter = 30;
        const interval = setInterval(function() {
            counter--;
            var counterElement = document.getElementById('counter');
            counterElement.innerHTML = 'Puede solicitar un nuevo código de verificación en ' + counter + ' segundos';
            if (counter <= 0) {
                clearInterval(interval);
                counterElement.style.display = 'none';
                document.querySelectorAll('.wait-for-counter').forEach(function(element) {
                    element.style.display = 'inline';
                });
            }
        }, 1000);
    });
</script>
@endpush
