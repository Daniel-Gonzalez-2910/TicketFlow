<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de usuario</title>
</head>

<body>

    <h1>Crear usuario</h1>

    <form action="/usuarios" method="POST">

        @csrf

        <label>Nombre:</label>
        <input type="text" name="name">

        <br><br>

        <label>Correo:</label>
        <input type="email" name="email">

        <br><br>

        <label>Contraseña:</label>
        <input type="password" name="password">

        <br><br>

        <button type="submit">Crear usuario</button>

    </form>

</body>
</html>