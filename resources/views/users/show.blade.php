@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')

<div>

    {{-- Título de la página --}}
    <h1>Detalles del Usuario</h1>


    {{-- ==================== NOMBRE ==================== --}}

    {{--
        $user viene desde el método show()
        del UserController.
    --}}
    <p>
        <strong>Nombre:</strong>
        {{ $user->name }}
    </p>


    {{-- ==================== EMAIL ==================== --}}

    <p>
        <strong>Email:</strong>
        {{ $user->email }}
    </p>


    {{-- ==================== EDITAR ==================== --}}

    {{--
        Enviamos el ID del usuario a la ruta users.edit.

        Ejemplo:
        /users/5/edit
    --}}
    <a href="{{ route('users.edit', $user->id) }}">
        Editar
    </a>


    {{-- ==================== ELIMINAR ==================== --}}

    {{--
        Formulario para eliminar al usuario.

        HTML no permite DELETE directamente,
        por eso enviamos POST y usamos @method('DELETE').
    --}}
    <form
        action="{{ route('users.destroy', $user->id) }}"
        method="POST"
    >

        {{-- Token de seguridad de Laravel --}}
        @csrf

        {{-- Laravel interpreta la petición como DELETE --}}
        @method('DELETE')

        <button type="submit">
            Eliminar
        </button>

    </form>


    {{-- ==================== REGRESAR ==================== --}}

    <a href="{{ route('users.index') }}">
        Volver a Usuarios
    </a>

</div>
@endsection