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
        <h3 class="govcolor-blue-dark">Nueva contraseña</h3>
        <div class="container-login-alerta-juridica-govco">
            <div class="icon-informacion-login-govco"></div>
        </div>
        <div class="container-login-opcion-govco">
            <form method="POST" action="/reset-password">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">
                <div class="mt-2">
                    <div class="row">
                        <div class="entradas-de-texto-govco col-lg-12 px-2 pb-0">
                            <label for="password">Nueva contraseña</label>
                            <div class="container-input-texto-govco">
                                <input required type="password" name="password" id="password" aria-required="true" class="@error('password') error @enderror">
                                <div class="icon-entradas-de-texto-govco success-icon-entradas-de-texto-govco" aria-label="success" aria-hidden="true"></div>
                                <div class="icon-entradas-de-texto-govco error-icon-entradas-de-texto-govco" aria-label="error" aria-hidden="true"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="entradas-de-texto-govco col-lg-12 px-2">
                            <label for="password_confirmation">Por favor confirme su nueva contraseña</label>
                            <div class="container-input-texto-govco">
                                <input required type="password" name="password_confirmation" id="password_confirmation" aria-required="true" class="@error('password') error @enderror">
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
