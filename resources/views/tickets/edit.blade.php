@extends('layouts.app')

@section('title', 'Tickets')

@section('content')


<div>

    {{-- Título de la página --}}
    <h1>Editar Ticket</h1>


    {{--
        Formulario para actualizar un ticket existente.

        route('tickets.update', $ticket->id):
        Busca la ruta "tickets.update" y le pasa el ID
        del ticket que queremos modificar.

        method="POST":
        HTML no permite PUT directamente en formularios,
        por eso usamos POST junto con @method('PUT').
    --}}
    <form action="{{ route('tickets.update', $ticket->id) }}" method="POST">

        {{-- Token de seguridad de Laravel --}}
        @csrf

        {{--
            Le indica a Laravel que esta petición debe
            tratarse realmente como una petición PUT.
        --}}
        @method('PUT')


        {{-- ==================== TÍTULO ==================== --}}
        <div>

            <label for="titulo">Título:</label>

            <input
                type="text"
                name="titulo"
                id="titulo"
                value="{{ old('titulo', $ticket->titulo) }}"
                required
            >

            @error('titulo')
                <p>{{ $message }}</p>
            @enderror

        </div>


        {{-- ================= DESCRIPCIÓN ================= --}}
        <div>

            <label for="descripcion">Descripción:</label>

            <textarea
                name="descripcion"
                id="descripcion"
                required
            >{{ old('descripcion', $ticket->descripcion) }}</textarea>

            @error('descripcion')
                <p>{{ $message }}</p>
            @enderror

        </div>


        {{-- ================= PRIORIDAD ================= --}}
        <div>

            <label for="prioridad">Prioridad:</label>

            <select
                name="prioridad"
                id="prioridad"
                required
            >

                <option
                    value="baja"
                    {{ old('prioridad', $ticket->prioridad) == 'baja' ? 'selected' : '' }}
                >
                    Baja
                </option>

                <option
                    value="media"
                    {{ old('prioridad', $ticket->prioridad) == 'media' ? 'selected' : '' }}
                >
                    Media
                </option>

                <option
                    value="alta"
                    {{ old('prioridad', $ticket->prioridad) == 'alta' ? 'selected' : '' }}
                >
                    Alta
                </option>

            </select>

            @error('prioridad')
                <p>{{ $message }}</p>
            @enderror

        </div>


        {{-- ================= USUARIO ================= --}}
        <div>

            <label for="user_id">Usuario:</label>

            <select
                name="user_id"
                id="user_id"
                required
            >

                @foreach ($usuarios as $usuario)

                    <option
                        value="{{ $usuario->id }}"
                        {{ old('user_id', $ticket->user_id) == $usuario->id ? 'selected' : '' }}
                    >
                        {{ $usuario->name }}
                    </option>

                @endforeach

            </select>

            @error('user_id')
                <p>{{ $message }}</p>
            @enderror

        </div>


        {{-- ================= ESTADO ================= --}}
        <div>

            <label for="estado">Estado:</label>

            <select
                name="estado"
                id="estado"
                required
            >

                <option
                    value="abierto"
                    {{ old('estado', $ticket->estado) == 'abierto' ? 'selected' : '' }}
                >
                    Abierto
                </option>

                <option
                    value="cerrado"
                    {{ old('estado', $ticket->estado) == 'cerrado' ? 'selected' : '' }}
                >
                    Cerrado
                </option>

            </select>

            @error('estado')
                <p>{{ $message }}</p>
            @enderror

        </div>


        {{-- Enviar los cambios --}}
        <button type="submit">
            Actualizar Ticket
        </button>

    </form>


    {{-- Regresar al listado --}}
    <a href="{{ route('tickets.index') }}">
        Volver a Tickets
    </a>

</div>
@endsection