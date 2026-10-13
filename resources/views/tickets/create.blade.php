@extends('layouts.app')

@section('title', 'Crear Ticket')
@section('content')

    <div>

        {{-- Título de la página --}}
        <h1>Crear Ticket</h1>


        {{-- 
        Formulario para crear un nuevo ticket.

        route('tickets.store'):
        Busca la ruta que tiene el nombre "tickets.store".

        method="POST":
        Enviaremos información nueva al servidor.
    --}}
        <form action="{{ route('tickets.store') }}" method="POST">


            {{-- 
            Token de seguridad de Laravel.
            Laravel lo requiere para formularios POST, PUT, PATCH y DELETE.
        --}}
            @csrf


            {{-- ==================== TÍTULO ==================== --}}
            <div>

                {{-- 
                El atributo "for" se relaciona con el id del input.
            --}}
                <label for="titulo">Título:</label>

                <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}" required>

                {{-- 
                Si la validación de "titulo" falla,
                Laravel mostrará aquí el mensaje de error.
            --}}
                @error('titulo')
                    <p>{{ $message }}</p>
                @enderror

            </div>


            {{-- ================= DESCRIPCIÓN ================= --}}
            <div>

                <label for="descripcion">Descripción:</label>

                <textarea name="descripcion" id="descripcion" required>{{ old('descripcion') }}</textarea>

                @error('descripcion')
                    <p>{{ $message }}</p>
                @enderror

            </div>


            {{-- ================= PRIORIDAD ================= --}}
            <div>

                <label for="prioridad">Prioridad:</label>

                <select name="prioridad" id="prioridad" required>

                    <option value="">Selecciona una prioridad</option>

                    <option value="baja" {{ old('prioridad') == 'baja' ? 'selected' : '' }}>
                        Baja
                    </option>

                    <option value="media" {{ old('prioridad') == 'media' ? 'selected' : '' }}>
                        Media
                    </option>

                    <option value="alta" {{ old('prioridad') == 'alta' ? 'selected' : '' }}>
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

                <select name="user_id" id="user_id" required>

                    <option value="">Selecciona un usuario</option>

                    {{-- 
                    $usuarios viene del TicketController.

                    Cada vuelta del foreach representa
                    un usuario obtenido de la base de datos.
                --}}
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" {{ old('user_id') == $usuario->id ? 'selected' : '' }}>
                            {{ $usuario->name }}
                        </option>
                    @endforeach

                </select>

                @error('user_id')
                    <p>{{ $message }}</p>
                @enderror

            </div>


            {{-- Enviar el formulario --}}
            <button type="submit" class="btn btn-primary">
                Crear Ticket
            </button>

        </form>


        {{-- Regresar al listado de tickets --}}
        <a href="{{ route('tickets.index') }}" class="btn btn-secondary">
            Volver a Tickets
        </a>

    </div>
@endsection
