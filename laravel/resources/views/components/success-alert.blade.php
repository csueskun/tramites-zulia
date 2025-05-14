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
@endif