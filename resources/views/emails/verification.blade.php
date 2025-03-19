
<!DOCTYPE html>
<html>
<head>
    <title>Verificación de Correo</title>
</head>
<body>
    <h4>Hola {{ $user->name }}</h4>
    Gracias por registrarte. Por favor verifica tu correo haciendo clic en el siguiente enlace:</p>
    <a href="{{ $url }}">Verificar mi cuenta</a> us ael co
    <p>Usa el código para verificar la cuenta:</p>
    <h6>Código de Verificación: {{ $verificationCode }}</h6>
    <p>Si no te registraste, ignora este correo.</p>
</body>
</html>
