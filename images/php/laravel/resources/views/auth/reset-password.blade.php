@extends('components.layout')

@section('title', 'Nueva contraseña')

@push('breadcrumb')
<li class="breadcrumb-item-govco"><a href="/forgot-password">Recuperar contraseña</a></li>
<li class="breadcrumb-item-govco active" aria-current="page">Nueva contraseña</li>
@endpush

@section('content')


<div class="new-user-content mt-2" data-content="natural">
    <div class="col-lg-6">
        @include('components.session-messages')
        <h3 class="">Nueva contraseña</h3>
        <div class="container-login-alerta-juridica-govco">
            <div class="icon-informacion-login-govco"></div>
        </div>
        <div class="container-login-opcion-govco">
            <form method="POST" action="/reset-password" id="reset-password-form">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">
                <div class="mt-2">
                    <div class="row">
                        <div class="entradas-de-texto-govco col-lg-12 px-2 pb-0">
                            <label for="password">Nueva contraseña</label>
                            <div class="container-input-texto-govco">
                                <input data-confirm-input="password_confirmation" typeData="mypassword" type="password" required name="password" id="password" placeholder="Ejemplo: ********" aria-required="true" maxlength="20" class="@error('password') error @enderror">
                                <div class="icon-entradas-de-texto-govco success-icon-entradas-de-texto-govco" aria-label="success" aria-hidden="true"></div>
                                <div class="icon-entradas-de-texto-govco error-icon-entradas-de-texto-govco" aria-label="error" aria-hidden="true"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="entradas-de-texto-govco col-lg-12 px-2">
                            <label for="password_confirmation">Por favor confirme su nueva contraseña</label>
                            <div class="container-input-texto-govco">
                                <input typeData="confirm" data-password-input="password" type="password" required name="password_confirmation" id="password_confirmation" placeholder="Ejemplo: ********" aria-required="true" maxlength="20" class="@error('password') error @enderror">
                                <div class="icon-entradas-de-texto-govco success-icon-entradas-de-texto-govco" aria-label="success" aria-hidden="true"></div>
                                <div class="icon-entradas-de-texto-govco error-icon-entradas-de-texto-govco" aria-label="error" aria-hidden="true"></div>
                            </div>
                            @if ($errors->has('password'))
                                @foreach ($errors->get('password') as $error)
                                    <span class="error-texto-govco alert-entradas-de-texto-govco" role="alert" aria-live="assertive">{{ $error }}</span>
                                @endforeach
                            @endif
                            @error('email')
                            <span class="error-texto-govco alert-entradas-de-texto-govco" role="alert" aria-live="assertive">{{ $message }}</span>
                            @enderror
                        </div>
                        <div id="info-password" class="entradas-de-texto-govco col-lg-12 text-box info-text-box mb-4">
                            <strong>La contraseña debe cumplir con los siguientes requisitos:</strong>
                            <ul class="mb-0">
                                <li>Mínimo 8 caracteres</li>
                                <li>Incluir al menos una mayúscula</li>
                                <li>Incluir al menos una minúscula</li>
                                <li>Incluir al menos un dígito</li>
                                <li>Incluir al menos un símbolo @ $ & - _ ? \ / # * ^ % + . ( ) </li>
                            </ul>
                        </div>
                        <label class="mb-4">
                            <input type="checkbox" id="togglePassword"> Mostrar contraseña
                        </label>
                    </div>
                    <button type="button" onclick="preSubmit()" class="btn-govco fill-btn-govco" name="continuar"
                        style="height: 42px;">Enviar
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-6"></div>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // let counter = 30;
        // const interval = setInterval(function() {
        //     counter--;
        //     var counterElement = document.getElementById('counter');
        //     counterElement.innerHTML = 'Puede solicitar un nuevo código de verificación en ' + counter + ' segundos';
        //     if (counter <= 0) {
        //         clearInterval(interval);
        //         counterElement.style.display = 'none';
        //         document.querySelectorAll('.wait-for-counter').forEach(function(element) {
        //             element.style.display = 'inline';
        //         });
        //     }
        // }, 1000);
        const passwordInputs = document.querySelectorAll('input[typeData="mypassword"]');
        methodAssign("keyup", customPasswordValidator, passwordInputs);
        const confirmInputs = document.querySelectorAll('input[typeData="confirm"]');
        methodAssign("keyup", customPasswordConfirmValidator, confirmInputs);

    });

    function preSubmit(){
        const form = document.getElementById('reset-password-form');
        const isValid = validateForm(form);
        if (!isValid) {
            event.preventDefault();
        }
        else{
            form.submit();
        }
    }

    const passwordInput = document.getElementById('password');
    const passwordConfirmationInput = document.getElementById('password_confirmation');
    const toggleCheckbox = document.getElementById('togglePassword');

    toggleCheckbox.addEventListener('change', () => {
        passwordInput.type = toggleCheckbox.checked ? 'text' : 'password';
        passwordConfirmationInput.type = toggleCheckbox.checked ? 'text' : 'password';
    });
</script>
@endpush
