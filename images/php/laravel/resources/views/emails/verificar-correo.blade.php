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
        Le informamos que su código de verificación es: <strong>{{ $verificationCode }}</strong>.
        <br>
        Si usted no solicitó esta verificación, puede ignorar este mensaje.
    </p>
    <p>
        Si tiene alguna consulta adicional o requiere asistencia, 
        no dude en comunicarse con nosotros a través de 
        <a href="mailto:transito.tramites@nortedesantander.gov.co">transito.tramites@nortedesantander.gov.co</a>
    </p>
    <p>
        Atentamente,<br>
        Secretaría de Tránsito, sede operativa El Zulia<br>
    </p>
</body>
</html>