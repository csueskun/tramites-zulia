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
        Adjuntamos el certificado para la solicitud realizada el dia <strong>{{ $fecha }}</strong> con número de
        radicado <strong>{{$radicado}}</strong> para <strong>{{$tramite}}</strong>.
    </p>
    <p>
        Por favor, revise el certificado adjunto y asegúrese de que toda la información 
        sea correcta. Si encuentra algún error o tiene alguna pregunta, 
        no dude en ponerse en contacto con nosotros a través de
        <a href="mailto:transito@nortedesantander.gov.co">transito@nortedesantander.gov.co</a>
    </p>
</body>
</html>