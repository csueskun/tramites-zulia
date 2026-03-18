@extends('components.layout')

@section('title', 'Inicio de sesión')

<x-s2mc-button element="email" />

@push('breadcrumb')
<li class="breadcrumb-item-govco active" aria-current="page">Inicio de sesión</li>
@endpush

@section('content')

@include('components.session-messages')
<div class="card">
    <div class="card-body d-flex justify-content-center" style="background-color: #F6F8F9;">

    <div class="card login-container">
    <div class="card-body">
            <h2>Inicio de sesión</h2>
            <div class="container-login-alerta-juridica-govco">
                <p class="text2-govco">Para realizar trámites, debes estar registrado con tu número de documento y ser representante legal de la empresa.</p>
            </div>

            <div class="login-label-govco mt-3">
                <p><strong>Los campos marcados con <span aria-require d="true">*</span> son obligatorios</strong></p>
            </div>
            <div class="container-login-opcion-govco" data-container-persona="natural">
                <form method="POST" action="/login">
                    @csrf
                    <div>
                        <div class="entradas-de-texto-govco mt-4">
                            <label id="valor-login" for="email">Correo electrónico*</label>
                            <div class="input-container actived-events-govco">
                                <input required type="mail" name="email" id="email" aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}" placeholder="Ejemplo: correo@email.com" typedata="mail" aria-required="true" class="@error('email') error @enderror" value="{{ old('email') }}" onkeyup="this.setAttribute('value', this.value);" aria-describedby="email-note">
                                <span class="govco-svg govco-check-circle success" aria-label="Válido" aria-hidden="true"></span>
                                <span class="govco-svg govco-exclamation-circle error" aria-label="Inválido" aria-hidden="true"></span>
                            </div>
                            @error('email')
                            <span class="error-texto-govco information-text" id="email-note" role="alert" aria-live="assertive">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="entradas-de-texto-govco mt-4">
                            <label id="valor-login" for="password">Contraseña*</label>
                            <div class="input-container actived-events-govco">
                                <input type="password" name="password" id="password" aria-describedby="password-note" aria-required="true" aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}" placeholder="******" minlength="4" typedata="password" value="" onkeyup="this.setAttribute('value', this.value);" class="@error('password') error @enderror">
                                <button id="togglePassword" type="button" class="govco-icon govco-eye-slash" aria-label="Mostrar contraseña"></button>
                                <span class="govco-svg govco-check-circle success" aria-label="Válido" aria-hidden="true"></span>      
                                <span class="govco-svg govco-exclamation-circle error" aria-label="Inválido" aria-hidden="true"></span>
                            </div>
                            @error('password')
                            <span class="error-texto-govco information-text" id="password-note" role="alert" aria-live="assertive">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn-govco fill-btn-govco" name="continuar" style="width: 165px; height: 42px;">Continuar</button>
                    </div>
                </form>

                <div class="container-options-login-govco">
                    <div class="mt-3">
                        <a class="mt-3 link-tipografia-govco" href="/forgot-password">Olvidé mi contraseña</a>
                    </div>
                    <p class="mt-3 text2-govco">¿No sabes cómo crear una cuenta? &nbsp;
                        <a class="mt-3 link-tipografia-govco" data-bs-toggle="modal" data-bs-target="#crear_usuario" href="#">Ver video</a>
                    </p>
                    <p class="mt-3 text2-govco">¿No tienes cuenta? &nbsp;
                        <a class="mt-3 link-tipografia-govco" href="/usuarios/nuevo">Regístrate aquí</a>
                    </p>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<!-- Modal Reset Password -->
<div class="modal fade" id="reset_password" role="dialog" aria-labelledby="mdWarningLabel" aria-hidden="true">
    <div class="container-modal-govco" id="modal_warning">
        <div class="modal-container-govco" id="exampleModalWarning" tabindex="-1" data-bs-backdrop="false"
            data-bs-keyboard="false" aria-labelledby="exampleModalAdvertencia" aria-hidden="true" aria-hidden="true"
            role="dialog">
            <div class="modal-dialog modal-dialog-govco">
                <div class="modal-content modal-content-govco">
                    <div class="modal-header modal-header-govco modal-header-alerts-govco">
                        <button type="button" disabled class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body modal-body-govco center-elements-govco">
                        <div class="modal-icon">
                            <span class="modal-icon-govco modal-warning-icon"></span>
                        </div>
                        <h3 class="modal-title-govco warning-govco">
                            Atención
                        </h3>
                        <p class="modal-text-govco modal-text-center-govco">
                            El proceso de restablecer contraseña se lleva a cabo por medio de correo 
                            electrónico. Por favor enviar la solicitud al siguiente email: 
                            <a href="mailto:soporte@nortedesantander.gov.co">transito.tramites@nortedesantander.gov.co</a>
                        </p>
                    </div>
                    <div class="modal-footer-govco modal-footer-alerts-govco">
                        <div class="modal-buttons-govco d-flex justify-content-center">
                            <button type="button" class="btn-govco fill-btn-govco fit-content btn-contorno" data-bs-dismiss="modal">
                                Cerrar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Reset Password -->
<div class="modal fade" id="crear_usuario" role="dialog" aria-labelledby="mdWarningLabel" aria-hidden="true">
    <div class="container-modal-govco" id="modal_warning">
        <div class="modal-container-govco" id="exampleModalWarning" tabindex="-1" data-bs-backdrop="false"
            data-bs-keyboard="false" aria-labelledby="exampleModalAdvertencia" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-govco">
                <div class="modal-content modal-content-govco">
                    <div class="modal-header modal-header-govco modal-header-alerts-govco">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body modal-body-govco center-elements-govco">
                        <h3 class="modal-title-govco warning-govco">
                            Crear cuenta de usuario
                        </h3>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/9fq-d-fB3S4" 
                                allowfullscreen></iframe>
                        </div>
                        <p class="modal-text-govco modal-text-center-govco mt-3">
                            En este video te mostramos cómo recuperar tu contraseña de acceso al sistema de trámites.
                        </p>
                    </div>
                    <div class="modal-footer-govco modal-footer-alerts-govco">
                        <div class="modal-buttons-govco d-flex justify-content-center">
                            <button type="button" class="btn-govco fill-btn-govco fit-content btn-contorno" data-bs-dismiss="modal">
                                Cerrar
                            </button>
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
        const passwordInput = document.getElementById('password');
        const toggleButton = document.getElementById('togglePassword');

        document.getElementById('togglePassword').addEventListener('click', () => {
            passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
            toggleButton.classList.toggle('govco-eye-slash');
            toggleButton.classList.toggle('govco-eye');
        });

    </script>
@endpush