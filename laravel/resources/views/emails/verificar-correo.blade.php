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
        Su código de verificación es: <strong>{{ $verificationCode }}</strong>.
        Si usted no solicitó esta verificación, puede ignorar este mensaje.
    </p>
    <p>Atentamente,<br>Secretaría de Tránsito, sede operativa El Zulia</p>
</body>
</html>