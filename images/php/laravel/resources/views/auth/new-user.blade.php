@extends('components.layout')

@section('title', 'Crear nuevo usuario')

<x-s2mc-button element="nombres" />

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
        <h3 class="">Crear nuevo usuario</h3>
        <div class="container-login-alerta-juridica-govco">
            <div class="icon-informacion-login-govco"></div>
            <p>Para crear un nuevo usuario, por favor completa el siguiente formulario con tu información personal.</p>
        </div>
        <div class="login-label-govco mt-2">
            <p><strong>* Campos obligatorios</strong></p>
        </div>
        <div class="container-login-opcion-govco" data-container-persona="natural">
            <form method="POST" action="/usuarios/nuevo" id="new-user-form">
                @csrf
                <div class="mt-2">
                    <div class="row">
                        <div class="entradas-de-texto-govco col-lg-12 px-2 mt-4">
                            <label for="nombres">Nombres*</label>
                            <div class="input-container actived-events-govco">
                                <input typeData="onlyText" required type="text" name="nombres" id="nombres" aria-invalid="{{ $errors->has('nombres') ? 'true' : 'false' }}" placeholder="Ejemplo: Carlos" aria-required="true" class="@error('nombres') error @enderror" value="{{ old('nombres') }}" onkeyup="this.setAttribute('value', this.value);" aria-describedby="nombres-note">
                                <span class="govco-svg govco-check-circle success" aria-label="Válido" aria-hidden="true"></span>
                                <span class="govco-svg govco-exclamation-circle error" aria-label="Inválido" aria-hidden="true"></span>
                            </div>
                            @error('nombres')
                            <span class="error-texto-govco alert-entradas-de-texto-govco" role="alert" aria-live="assertive">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="entradas-de-texto-govco col-lg-12 px-2 mt-4">
                            <label for="apellidos">Apellidos*</label>
                            <div class="input-container actived-events-govco">
                                <input typeData="onlyText" type="text" required pattern="[A-Za-z\s]+" oninvalid="this.setCustomValidity('Solo se permiten letras y espacios')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')"
                                    name="apellidos" id="apellidos" placeholder="Ejemplo: Pérez" aria-required="true" class="@error('apellidos') error @enderror" value="{{ old('apellidos') }}">
                                <span class="govco-svg govco-check-circle success" aria-label="Válido" aria-hidden="true"></span>
                                <span class="govco-svg govco-exclamation-circle error" aria-label="Inválido" aria-hidden="true"></span>
                            </div>
                            @error('apellidos')
                            <span class="error-texto-govco alert-entradas-de-texto-govco" role="alert" aria-live="assertive">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="entradas-de-texto-govco col-lg-6 px-2 mt-4">
                            <label for="tipo_documento" class="label-desplegable-govco">Tipo de documento<span aria-required="true">*</span></label>
                            <div id="dropdown_container" class="desplegable-govco @error('tipo_documento') error-desplegable-govco @enderror" id="lista-desplegables" data-type="basic">
                                <div class="icon-entradas-de-texto-govco success-icon-entradas-de-texto-govco" aria-label="success" aria-hidden="false"></div>
                                <select typeData="select" required="true" aria-required="true" aria-invalid="false" aria-describedby="tipo_documento" name="tipo_documento">
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
                        <div class="entradas-de-texto-govco col-lg-6 px-2 mt-4">
                            <label for="documento">Documento*</label>
                            <div class="input-container actived-events-govco">
                                <input typeData="onlyNumber" type="text" required name="documento" id="documento" placeholder="Ejemplo: 1234567890" minlength="7" maxlength="10"
                                    aria-required="true" class="@error('documento') error @enderror" value="{{ old('documento') }}">
                                <span class="govco-svg govco-check-circle success" aria-label="Válido" aria-hidden="true"></span>
                                <span class="govco-svg govco-exclamation-circle error" aria-label="Inválido" aria-hidden="true"></span>
                            </div>
                            @error('documento')
                            <span class="error-texto-govco alert-entradas-de-texto-govco" role="alert" aria-live="assertive">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="entradas-de-texto-govco px-2 mt-4">
                            <label for="email">Correo electrónico*</label>
                            <div class="input-container actived-events-govco">
                                <input typeData="mail" type="text" required name="email" id="email" placeholder="Ejemplo: correo@email.com" aria-required="true" class="@error('email') error @enderror" value="{{ old('email') }}">
                                <span class="govco-svg govco-check-circle success" aria-label="Válido" aria-hidden="true"></span>
                                <span class="govco-svg govco-exclamation-circle error" aria-label="Inválido" aria-hidden="true"></span>
                            </div>
                            @error('email')
                            <span class="error-texto-govco alert-entradas-de-texto-govco" role="alert" aria-live="assertive">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="entradas-de-texto-govco col-lg-6 px-2 mt-4">
                            <label for="email">Contraseña*</label>
                            <div class="input-container actived-events-govco">
                                <input data-confirm-input="password_confirmation" typeData="mypassword" type="password" required name="password" id="password" placeholder="Ejemplo: ********" aria-required="true" maxlength="20" class="@error('password') error @enderror">
                                <span class="govco-svg govco-check-circle success" aria-label="Válido" aria-hidden="true"></span>
                                <span class="govco-svg govco-exclamation-circle error" aria-label="Inválido" aria-hidden="true"></span>
                            </div>
                            @error('password')
                            <span class="error-texto-govco alert-entradas-de-texto-govco" role="alert" aria-live="assertive">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="entradas-de-texto-govco col-lg-6 px-2 mt-4">
                            <label for="password_confirmation">Confirmar Contraseña*</label>
                            <div class="input-container actived-events-govco">
                                <input typeData="confirm" data-password-input="password" type="password" required name="password_confirmation" id="password_confirmation" placeholder="Ejemplo: ********" aria-required="true" maxlength="20" class="@error('password') error @enderror">
                                <span class="govco-svg govco-check-circle success" aria-label="Válido" aria-hidden="true"></span>
                                <span class="govco-svg govco-exclamation-circle error" aria-label="Inválido" aria-hidden="true"></span>
                            </div>
                            @error('password')
                            <span class="error-texto-govco alert-entradas-de-texto-govco" role="alert" aria-live="assertive">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="">
                            <div class="checkbox-seleccion-govco entradas-de-texto-govco">
                                <input id="togglePassword" name="habeas_data" type="checkbox">
                                <label for="togglePassword">Mostrar contraseña.</label>
                            </div>
                        </div>
                        <div id="info-password" class="col-lg-12 text-box info-text-box mb-4">
                            <strong>La contraseña debe cumplir con los siguientes requisitos:</strong>
                            <ul class="mb-0">
                                <li>Mínimo 8 caracteres</li>
                                <li>Incluir al menos una mayúscula</li>
                                <li>Incluir al menos una minúscula</li>
                                <li>Incluir al menos un dígito</li>
                                <li>Incluir al menos un símbolo @ $ & - _ ? \ / # * ^ % + . ( ) </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="checkbox-seleccion-govco entradas-de-texto-govco">
                            <input id="habeas_data" name="habeas_data" type="checkbox" typeData="checkbox" data-error-msg="Debe autorizar el tratamiento de sus datos personales">
                            <label for="habeas_data">Autorizo el tratamiento de mis datos personales de acuerdo con la política de privacidad y protección de datos.</label>
                        </div>
                        <span class="error-texto-govco alert-entradas-de-texto-govco" role="alert" aria-live="assertive"></span>
                    </div>

                    <div class="col-lg-12">
                        <div class="checkbox-seleccion-govco entradas-de-texto-govco">
                            <input id="terms_conditions" name="terms_conditions" type="checkbox" typeData="checkbox" data-error-msg="Debe aceptar los términos y condiciones">
                            <label for="terms_conditions">Acepto los términos y condiciones de uso del portal.</label>
                        </div>
                        <span class="error-texto-govco alert-entradas-de-texto-govco" role="alert" aria-live="assertive"></span>
                    </div>

                    <div class="col-lg-6">
                        <div class="captcha-container entradas-de-texto-govco">
                            <label for="captcha">Código de seguridad*</label>
                            <div class="captcha-image mb-2 d-flex align-items-center">
                                <span id="captcha-img">{!! captcha_img('flat') !!}</span>
                                <button type="button" class="btn-govco outline-btn-govco btn-sm ms-2" onclick="refreshCaptcha()" style="width: auto; height: auto; padding: 5px 10px;">
                                    Recargar
                                </button>
                            </div>
                            <div class="input-container actived-events-govco">
                                <input typeData="captcha" type="text" name="captcha" id="captcha" placeholder="Ingrese el código" required class="@error('captcha') error @enderror">
                                <div class="icon-entradas-de-texto-govco error-icon-entradas-de-texto-govco" aria-label="error" aria-hidden="true"></div>
                            </div>
                            @error('captcha')
                            <span class="error-texto-govco alert-entradas-de-texto-govco" role="alert" aria-live="assertive">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div>
                    <button onclick="preSubmit()" type="button" class="btn-govco fill-btn-govco" name="continuar" style="width: 165px; height: 42px;">Guardar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-6"></div>
</div>

@endsection

@push('scripts')
    <script>
        const passwordInput = document.getElementById('password');
        const passwordConfirmationInput = document.getElementById('password_confirmation');
        const toggleCheckbox = document.getElementById('togglePassword');

        toggleCheckbox.addEventListener('change', () => {
            passwordInput.type = toggleCheckbox.checked ? 'text' : 'password';
            passwordConfirmationInput.type = toggleCheckbox.checked ? 'text' : 'password';
        });

        document.addEventListener('DOMContentLoaded', function() {
            return false;
            @if(old('tipo_documento'))
                const tipoDocumentoSelect = document.getElementById('tipo_documento');
                const oldTipoDocumento = "{{ old('tipo_documento') }}";
                if (oldTipoDocumento) {
                    tipoDocumentoSelect.value = oldTipoDocumento;
                }
            @endif

            const emailInputs = document.querySelectorAll('input[typeData="mail"]');
            methodAssign("keyup", emailValidator, emailInputs);
            const passwordInputs = document.querySelectorAll('input[typeData="mypassword"]');
            methodAssign("keyup", customPasswordValidator, passwordInputs);
            const confirmInputs = document.querySelectorAll('input[typeData="confirm"]');
            methodAssign("keyup", customPasswordConfirmValidator, confirmInputs);
            const onlyTextInputs = document.querySelectorAll('input[typeData="onlyText"]');
            methodAssign("keyup", onlyTextValidator, onlyTextInputs);
            const onlyNumberInputs = document.querySelectorAll('input[typeData="onlyNumber"]');
            methodAssign("keyup", onlyNumberValidator, onlyNumberInputs);
            document.getElementById('dropdown_container').addEventListener('change', function(event) {
                const input = this.querySelector('input[typedata="select"]');
                selectValidator.call(input);
            });
        });
        function preSubmit(){
            const form = document.getElementById('new-user-form');
            const isValid = validateForm(form);
            if (!isValid) {
                event.preventDefault();
            }
            else{
                form.submit();
            }
        }

        function refreshCaptcha() {
            fetch('/captcha/api/flat')
                .then(response => response.json())
                .then(data => {
                    const captchaContainer = document.getElementById('captcha-img');
                    const img = captchaContainer.querySelector('img');
                    if (img) {
                        img.src = data.img;
                    } else {
                        captchaContainer.innerHTML = `<img src="${data.img}">`;
                    }
                });
        }
    </script>
@endpush
