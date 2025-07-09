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
        Adjuntamos el <strong>Certificado de libertad y tradición de un vehículo automotor</strong> 
        correspondiente a la solicitud realizada el dia <strong>{{ $fecha }}</strong>, con número de 
        radicado <strong>{{$radicado}}</strong>.
    </p>
    <p>
        Por favor, revise el certificado adjunto y asegúrese de que toda la información 
        sea correcta. En caso de encontrar alguna inconsistencia o si tiene alguna pregunta, 
        no dude en ponerse en contacto con nosotros a través de
        <a href="mailto:transito.sistemas@nortedesantander.gov.co">transito.sistemas@nortedesantander.gov.co</a>
    </p>
    <p>
        <strong>Si desea obtener el certificado en formato físico, 
        puede acercarse directamente a la Secretaría de Tránsito</strong>
    </p>
    <p>
        Atentamente,<br>
        Secretaría de Tránsito, sede operativa El Zulia<br>
    </p>
</body>
</html>