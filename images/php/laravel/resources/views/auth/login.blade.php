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

        <div class="inicio-sesion-govco" data-content="natural"  id="para-mirar">
            <h2>Inicio de sesión</h2>
            <div class="container-login-alerta-juridica-govco">
                <p>Para realizar trámites, debes estar registrado con tu número de documento y ser representante legal de la empresa.</p>
            </div>

            <div class="login-label-govco mt-3">
                <p><strong>Los campos marcados con <span aria-require d="true">*</span> son obligatorios</strong></p>
            </div>
            <div class="container-login-opcion-govco" data-container-persona="natural">
                <form method="POST" action="/login">
                    @csrf
                    <div class="mt-4">
                        <div class="entradas-de-texto-govco">
                            <label id="valor-login" for="email">Correo electrónico*</label>
                            <div class="container-input-texto-govco">
                                <input type="email" name="email" id="email" aria-invalid="false" placeholder="Ejemplo: correo@email.com" typedata="mail" aria-required="true" class="@error('email') error @enderror" value="{{ old('email') }}">
                                <div class="icon-entradas-de-texto-govco success-icon-entradas-de-texto-govco" aria-label="success" aria-hidden="true"></div>
                                <div class="icon-entradas-de-texto-govco error-icon-entradas-de-texto-govco" aria-label="error" aria-hidden="true"></div>
                            </div>
                            @error('email')
                            <span class="error-texto-govco alert-entradas-de-texto-govco" id="campoWarning-id" role="alert" aria-live="assertive">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="entradas-de-texto-govco">
                            <label id="valor-login" for="password">Contraseña*</label>
                            <div class="container-input-texto-govco">
                                <input type="password" name="password" id="password" aria-invalid="false" placeholder="Ejemplo: ********" aria-required="true" maxlength="20" class="@error('password') error @enderror">
                                <div class="icon-entradas-de-texto-govco success-icon-entradas-de-texto-govco" aria-label="success" aria-hidden="true"></div>
                                <div class="icon-entradas-de-texto-govco error-icon-entradas-de-texto-govco" aria-label="error" aria-hidden="true"></div>
                            </div>
                            @error('password')
                            <span class="error-texto-govco alert-entradas-de-texto-govco" id="campoWarning-id" role="alert" aria-live="assertive">{{ $message }}</span>
                            @enderror
                        </div>
                        <label class="mb-4">
                            <input type="checkbox" id="togglePassword"> Mostrar contraseña
                        </label>
                    </div>
                    <div>
                        <button type="submit" class="btn-govco fill-btn-govco" name="continuar" style="width: 165px; height: 42px;">Continuar</button>
                    </div>
                </form>

                <div class="container-options-login-govco">
                    <div class="mt-3">
                        <a class="mt-3" href="/forgot-password">Olvidé mi contraseña</a>
                    </div>
                    <p class="mt-3">¿No sabes cómo crear una cuenta? &nbsp;
                        <a class="mt-3" data-bs-toggle="modal" data-bs-target="#crear_usuario" href="#">Ver video</a>
                    </p>
                    <p class="mt-3">¿No tienes cuenta? &nbsp;
                        <a class="mt-3" href="/usuarios/nuevo">Regístrate aquí</a>
                    </p>
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
        const toggleCheckbox = document.getElementById('togglePassword');

        toggleCheckbox.addEventListener('change', () => {
            passwordInput.type = toggleCheckbox.checked ? 'text' : 'password';
        });

    </script>
@endpush