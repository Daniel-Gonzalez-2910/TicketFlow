<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    {{-- 
        Cada vista podrá definir su propio título.

        Si no define ninguno, se utilizará "TicketFlow".
    --}}
    <title>
        @yield('title', 'TicketFlow')
    </title>

    {{--
        Carga los archivos principales de CSS y JavaScript
        mediante Vite.
    --}}
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body>

    {{-- Encabezado general de toda la aplicación --}}
<header>

    <h1>TicketFlow</h1>

<nav>

    <a
        href="{{ route('tickets.index') }}"
        @class([
            'active' => request()->routeIs('tickets.*')
        ])
    >
        Tickets
    </a>

    <a
        href="{{ route('users.index') }}"
        @class([
            'active' => request()->routeIs('users.*')
        ])
    >
        Usuarios
    </a>

</nav>

</header>


    {{-- 
        Aquí se insertará el contenido particular
        de cada una de nuestras vistas.
    --}}
    <main>

        @yield('content')

    </main>

</body>

</html>