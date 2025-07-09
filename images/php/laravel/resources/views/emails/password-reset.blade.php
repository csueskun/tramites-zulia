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
        Para crear una nueva contraseña, por favor haga clic en el siguiente enlace:
        <a href="{{ $url }}">Crear nueva contraseña</a>.
    </p>
    <p>
        Si no ha solicitado este procedimiento, puede ignorar este mensaje.
        <br>
        Para cualquier consulta adicional o si requiere asistencia, 
        no dude en comunicarse con nosotros a través del correo electrónico 
        <a href="mailto:transito.sistemas@nortedesantander.gov.co">transito.sistemas@nortedesantander.gov.co</a>
    </p>
    <p>
        Atentamente,<br>
        Secretaría de Tránsito, sede operativa El Zulia<br>
    </p>
</body>
</html>