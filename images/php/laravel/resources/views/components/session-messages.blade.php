<div class="container-alerta-govco">
    <div class="alert alerta-govco notificacion-success-govco" role="alert">
        <span class="govco-svg govco-check-circle-fix fs-mr" aria-label="success"></span>
        <p>
            {{ session('success') }} asdasdas
        </p>
    </div>
</div>
<div class="container-alerta-govco">
    <div class="alert alerta-govco notificacion-error-govco" role="alert">
        <span class="govco-icon govco-times-cancel fs-mr" aria-label="error"></span>
        <p>
            {{ session('error') }} asdasdasd
        </p>
    </div>
</div>
@if (session('success'))
<br />
@elseif (session('error'))
<br />
@elseif (session('warning'))
<br />
@endif
<div class="container-alerta-govco">
    <div class="alert alerta-govco notificacion-advertencia-govco" role="alert">
        <span class="govco-icon govco-exclamation-triangle fs-mr" aria-label="advertencia"></span>
        <p>
            {{ session('warning') }} asdasdad
        </p>
    </div>
</div>