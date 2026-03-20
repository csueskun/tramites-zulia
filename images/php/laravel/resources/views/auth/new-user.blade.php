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
                                <input typeData="onlyText" required type="text" name="nombres" id="nombres" aria-invalid="{{ $errors->has('nombres') ? 'true' : 'false' }}" placeholder="Ejemplo: Pedro" aria-required="true" class="@error('nombres') error @enderror" value="{{ old('nombres') }}" onkeyup="this.setAttribute('value', this.value);" aria-describedby="nombres-note">
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
                                <input typeData="onlyText" required type="text" name="apellidos" id="apellidos" aria-invalid="{{ $errors->has('apellidos') ? 'true' : 'false' }}" placeholder="Ejemplo: Perez" aria-required="true" class="@error('apellidos') error @enderror" value="{{ old('apellidos') }}" onkeyup="this.setAttribute('value', this.value);" aria-describedby="apellidos-note">
                                <span class="govco-svg govco-check-circle success" aria-label="Válido" aria-hidden="true"></span>
                                <span class="govco-svg govco-exclamation-circle error" aria-label="Inválido" aria-hidden="true"></span>
                            </div>
                            @error('apellidos')
                            <span class="error-texto-govco alert-entradas-de-texto-govco" role="alert" aria-live="assertive">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="entradas-de-texto-govco dropdown desplegable-govco col-lg-6 px-2 mt-4">
                            <label for="dropdown1" class="display-flex m-0">Etiqueta<span aria-required="true">*</span></label>
                            <div class="container-dropdown">
                                <input typeData="onlyText" required aria-required="true" type="hidden" value="" aria-invalid="false" aria-describedby="alert-id" name="tipo_documento" id="tipo_documento_input">
                                <button class="btn-dropdown" type="button" id="dropdown1" data-bs-toggle="dropdown" aria-expanded="false">Elegir</button>
                                <div class="input-group icons-dropdown">
                                    <span class="input-group-text govco-icon govco-angle-down" id="dropdown-icon"></span>
                                </div>          
                                <div class="dropdown-menu dropdown-options-govco" aria-labelledby="dropdown1" style="">
                                    <ul>
                                        <li tabindex="0" class="dropdown-item" data-value="CC">Cédula de ciudadanía</li>
                                        <li tabindex="0" class="dropdown-item" data-value="CE">Cédula de extranjería</li>
                                        <li tabindex="0" class="dropdown-item" data-value="PA">Pasaporte</li>
                                        <li tabindex="0" class="dropdown-item" data-value="RC">Registro civil</li>
                                        <li tabindex="0" class="dropdown-item" data-value="TI">Tarjeta de identidad</li>
                                    </ul>
                                </div>
                            </div>
                            @error('documento')
                            <span class="error-texto-govco alert-entradas-de-texto-govco" role="alert" aria-live="assertive">{{ $message }}</span>
                            @enderror
                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                const dropdown = document.getElementById('dropdown1');
                                const input = document.getElementById('tipo_documento_input');
                                const dropdownItems = document.querySelectorAll('.dropdown-item');
                                const dropdownIcon = document.getElementById('dropdown-icon');
                                const dropdownMenu = document.querySelector('.dropdown-menu');

                                dropdownItems.forEach(item => {
                                    item.addEventListener('click', function () {
                                        const value = this.getAttribute('data-value');
                                        const text = this.textContent;

                                        input.value = value;
                                        dropdown.textContent = text;

                                        dropdownItems.forEach(i => i.classList.remove('active'));
                                        this.classList.add('active');

                                        // Hide the dropdown menu after selection
                                        if (dropdownMenu) {
                                            dropdownIcon.click();
                                            // dropdownMenu.classList.remove('show');
                                        }
                                    });
                                });

                                // Show dropdown menu on icon click
                                dropdownIcon.addEventListener('click', function () {
                                    dropdownMenu.classList.toggle('show');
                                });
                            });
                        </script>
                        <div class="entradas-de-texto-govco actived-events-govco col-lg-6 px-2 mt-4">
                            <label for="documento">Documento*</label>
                            <div class="input-container actived-events-govco">
                                <input typeData="num" required type="text" name="documento" id="documento" aria-invalid="{{ $errors->has('documento') ? 'true' : 'false' }}" placeholder="Ejemplo: Perez" aria-required="true" class="@error('documento') error @enderror" value="{{ old('documento') }}" onkeyup="this.setAttribute('value', this.value);" aria-describedby="documento-note">
                                <span class="govco-svg govco-check-circle success" aria-label="Válido" aria-hidden="true"></span>
                                <span class="govco-svg govco-exclamation-circle error" aria-label="Inválido" aria-hidden="true"></span>
                            </div>
                            @error('documento')
                            <span class="error-texto-govco alert-entradas-de-texto-govco" role="alert" aria-live="assertive">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="entradas-de-texto-govco col-lg-12 px-2 mt-4">
                            <label for="email">Correo electrónico*</label>
                            <div class="input-container actived-events-govco">
                                <input required type="mail" name="email" id="email" aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}" placeholder="Ejemplo: correo@email.com" typedata="mail" aria-required="true" class="@error('email') error @enderror" value="{{ old('email') }}" onkeyup="this.setAttribute('value', this.value);" aria-describedby="email-note">
                                <span class="govco-svg govco-check-circle success" aria-label="Válido" aria-hidden="true"></span>
                                <span class="govco-svg govco-exclamation-circle error" aria-label="Inválido" aria-hidden="true"></span>
                            </div>
                            @error('email')
                            <span class="error-texto-govco information-text" id="email-note" role="alert" aria-live="assertive">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="entradas-de-texto-govco col-lg-6 px-2 mt-4">
                            <label for="email">Contraseña*</label>
                            <div class="input-container actived-events-govco">
                                <!-- <input data-confirm-input="password_confirmation" typeData="mypassword" type="password" required name="password" id="password" placeholder="Ejemplo: ********" aria-required="true" maxlength="20" class="@error('password') error @enderror"> -->
                                <input data-confirm-input="password_confirmation" type="password" name="password" id="password" aria-describedby="password-note" aria-required="true" aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}" placeholder="******" minlength="4" typedata="password" value="" onkeyup="this.setAttribute('value', this.value);" class="@error('password') error @enderror">
                                <button id="togglePassword" type="button" class="govco-icon govco-eye-slash" aria-label="Mostrar contraseña"></button>
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
                    </div>

                    <div class="col-lg-12">
                        <div class="checkbox-seleccion-govco mt-4 entradas-de-texto-govco display-block">
                            <table>
                                <tr>
                                    <td>
                                        <input id="habeas_data" name="habeas_data" type="checkbox" typeData="checkbox" data-error-msg="Debe autorizar el tratamiento de sus datos personales">
                                    </td>
                                    <td>
                                        <label for="habeas_data">Autorizo el tratamiento de mis datos personales de acuerdo con la <a class="link-tipografia-govco" href="https://www.nortedesantander.gov.co/#/pagina/politicas-de-privacidad-y-terminos-de-uso" target="_blank">política de privacidad y protección de datos</a></label>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <span class="error-texto-govco alert-entradas-de-texto-govco" role="alert" aria-live="assertive"></span>
                    </div>

                    <div class="col-lg-12">
                        <div class="checkbox-seleccion-govco mt-4 entradas-de-texto-govco display-block">
                            <table>
                                <tr>
                                    <td>
                                        <input id="terms_conditions" name="terms_conditions" type="checkbox" typeData="checkbox" data-error-msg="Debe aceptar los términos y condiciones">
                                    </td>
                                    <td>
                                        <label for="terms_conditions">Acepto los <a class="link-tipografia-govco" href="https://www.nortedesantander.gov.co/#/pagina/terminos-y-condiciones-de-uso" target="_blank">términos y condiciones</a> de uso del portal.</label>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <span class="error-texto-govco alert-entradas-de-texto-govco" role="alert" aria-live="assertive"></span>
                    </div>

                    <div class="col-lg-6">
                        <div class="captcha-container entradas-de-texto-govco mt-4">
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
                <div class="mt-4">
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
            // return false;
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
            const numInputs = document.querySelectorAll('input[typeData="num"]');
            methodAssign("keyup", onlyNumberValidator, numInputs);
            // document.getElementById('dropdown_container').addEventListener('change', function(event) {
            //     const input = this.querySelector('input[typedata="select"]');
            //     selectValidator.call(input);
            // });
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
    <script>
        const passwordInputB = document.getElementById('password');
        const confirmInput = document.getElementById('password_confirmation');
        const toggleButton = document.getElementById('togglePassword');

        document.getElementById('togglePassword').addEventListener('click', () => {
            passwordInputB.type = passwordInputB.type === 'password' ? 'text' : 'password';
            confirmInput.type = confirmInput.type === 'password' ? 'text' : 'password';
            toggleButton.classList.toggle('govco-eye-slash');
            toggleButton.classList.toggle('govco-eye');
        });

    </script>
@endpush
