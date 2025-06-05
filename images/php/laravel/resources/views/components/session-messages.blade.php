@if (session('success'))
<div class="container-alerta-govco">
    <div class="alert alerta-govco alerta-success-govco asuccess" role="alert">
        <span class="alerta-icon-govco alerta-icon-notificacion-govco asuccess"></span>
        <p class="alerta-content-text">
            {{ session('success') }}
        </p>
    </div>
</div>
<br />
@elseif (session('error'))
<div class="container-alerta-govco">
    <div class="alert alerta-govco alerta-error-govco aerror" role="alert">
        <span class="alerta-icon-govco alerta-icon-notificacion-govco aerror"></span>
        <p class="alerta-content-text">
            {{ session('error') }}
        </p>
    </div>
</div>
<br />
@endif