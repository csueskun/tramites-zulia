@if (session('success'))
<div class="container-alerta-govco">
    <div class="alert alerta-govco notificacion-success-govco" role="alert">
        <span class="govco-svg govco-check-circle-fix fs-mr" aria-label="success"></span>
        <p>
            {{ session('success') }}
        </p>
    </div>
</div>
<br />
@elseif (session('error'))
<div class="container-alerta-govco">
    <div class="alert alerta-govco notificacion-error-govco" role="alert">
        <span class="govco-icon govco-times-cancel fs-mr" aria-label="error"></span>
        <p>
            {{ session('error') }}
        </p>
    </div>
</div>
<br />
@endif