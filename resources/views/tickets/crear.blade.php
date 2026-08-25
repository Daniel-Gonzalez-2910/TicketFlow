<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Crear Ticket | TicketFlow</title>
</head>

<body>

    <h1>Crear nuevo ticket</h1>

    <form>
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

        <button type="submit">Crear ticket</button>

    </form>

</body>
</html>

