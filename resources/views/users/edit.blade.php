@extends('layouts.app')

@section('title', 'Tickets')

@section('content')

<div>

    {{-- Título de la página --}}
    <h1>Editar Usuario</h1>


    {{--
        Formulario para actualizar un usuario existente.

        route('users.update', $user->id):
        Busca la ruta llamada "users.update"
        y le pasa el ID del usuario que queremos modificar.

        Ejemplo:
        /users/5
    --}}
    <form action="{{ route('users.update', $user->id) }}" method="POST">


        {{--
            Token de seguridad de Laravel.
            Es obligatorio para formularios que modifican información.
        --}}
        @csrf


        {{--
            Los formularios HTML solo manejan directamente
            GET y POST.

            Con @method('PUT') le indicamos a Laravel que
            esta petición debe tratarse como PUT.
        --}}
        @method('PUT')


        {{-- ==================== NOMBRE ==================== --}}
        <div>

            <label for="name">Nombre:</label>

            {{--
                old('name', $user->name):

                Si hubo un error de validación, muestra
                el último valor que escribió el usuario.

                Si no hubo error, muestra el nombre
                actual almacenado en la base de datos.
            --}}
            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name', $user->name) }}"
                required
            >

            {{-- Mostrar error de validación del nombre --}}
            @error('name')
                <p>{{ $message }}</p>
            @enderror

        </div>


        {{-- ==================== EMAIL ==================== --}}
        <div>

            <label for="email">Email:</label>

            <input
                type="email"
                name="email"
                id="email"
                value="{{ old('email', $user->email) }}"
                required
            >

            {{-- Mostrar error de validación del correo --}}
            @error('email')
                <p>{{ $message }}</p>
            @enderror

        </div>


        {{-- Enviar los cambios --}}
        <button type="submit">
            Actualizar Usuario
        </button>

    </form>


    {{-- Regresar al listado de usuarios --}}
    <a href="{{ route('users.index') }}">
        Volver a Usuarios
    </a>

</div>
