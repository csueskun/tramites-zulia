<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>Estimado <i>{{ $nombres }}</i>,</p>
    <p>
        Adjuntamos el recibo de pago para la solicitud realizada el dia <strong>{{ $fecha }}</strong> con número de
        radicado <strong>{{$radicado}}</strong> para <strong>{{$tramite}}</strong>.
    </p>
    @if(!empty($link_pago))
    <p>
        Adicionalmente, puede realizar el pago en línea a través del siguiente enlace:
        <a href="{{ $link_pago }}" target="_blank">Pagar en línea</a>
    </p>    
    @endif
    <p>
        Por favor, revise el recibo adjunto y asegúrese de que toda la información 
        sea correcta. Si encuentra algún error o tiene alguna pregunta, 
        no dude en ponerse en contacto con nosotros a través de
        <a href="mailto:transito@nortedesantander.gov.co">transito@nortedesantander.gov.co</a>
    </p>
    <p>
        Diríjase a la plataforma para consultar el estado de su solicitud,
        y cargar la constancia de pago dando <a href="{{ env('APP_URL') }}">click aquí</a>.
    </p>
    <p>Atentamente,<br>Secretaría de Tránsito, sede operativa El Zulia</p>
</body>
</html>