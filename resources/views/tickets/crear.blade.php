<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Crear Ticket | TicketFlow</title>
</head>

<body>

    <h1>Crear nuevo ticket</h1>

    <form action="/tickets" method="POST">
    @csrf
        <div>
            <label for="titulo">Título:</label>
            <input
                type="text"
                id="titulo"
                name="titulo"
                placeholder="Escribe el título del ticket"
            >
        </div>

        <br>

        <div>
            <label for="descripcion">Descripción:</label>
            <textarea
                id="descripcion"
                name="descripcion"
                placeholder="Describe el problema"
            ></textarea>
        </div>

        <br>

        <div>
            <label for="prioridad">Prioridad:</label>

            <select id="prioridad" name="prioridad">
                <option value="baja">Baja</option>
                <option value="media" selected>Media</option>
                <option value="alta">Alta</option>
            </select>
        </div>

        <br>

        <br>

<div>
    <label for="estado">Estado:</label>

    <select id="estado" name="estado">
        <option value="abierto" selected>Abierto</option>
        <option value="cerrado">Cerrado</option>
    </select>
</div>

<br>

<div>
    <label for="user_id">Usuario:</label>

    <select id="user_id" name="user_id">
        <option value="1">Usuario Prueba</option>
        <option value="2">Daniel</option>
    </select>
</div>

<br>
        <button type="submit">Crear ticket</button>

    </form>

</body>
</html>

