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
        Le informamos que la solicitud realizada el dia <strong>{{ $fecha }}</strong> con número de 
        radicado <strong>{{$radicado}}</strong> para <strong>{{$tramite}}</strong> ha sido aceptada.
    </p>
    <p>
        Si tiene alguna consulta adicional o requiere asistencia, 
        no dude en comunicarse con nosotros a través de 
        <a href="mailto:transito@nortedesantander.gov.co">transito@nortedesantander.gov.co</a>
    </p>
    <p>Atentamente,<br>Secretaría de Tránsito, sede operativa El Zulia</p>
</body>
</html>