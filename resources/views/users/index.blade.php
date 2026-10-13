@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')

    <div>

        {{-- Título de la página --}}
        <h1>Usuarios</h1>
        <a href="{{ route('users.create') }}" class="btn btn-primary">
            Crear Usuario
        </a>


        {{-- ================= LISTA DE USUARIOS ================= --}}

        <ul>
            @forelse ($users as $user)
                <li class="user-item">

                    <span>
                        {{ $loop->iteration }}.
                    </span>

                    <div class="user-info">

                        <a href="{{ route('users.show', $user->id) }}">
                            {{ $user->name }}
                        </a>

                        <span>
                            {{ $user->email }}
                        </span>

                    </div>

                    <div class="user-actions">

                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-secondary">
                            Editar
                        </a>

                        <form action="{{ route('users.destroy', $user->id) }}" 
                            method="POST"
                            class="form-eliminar"
                            data-id="{{ $user->id }}"
                            data-tipo="usuario"
                            >
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">
                                Eliminar
                            </button>
                        </form>

                    </div>

                </li>

            @empty

                <li>
                    No hay usuarios registrados.
                </li>
            @endforelse
        </ul>

    </div>
@endsection

@push('scripts')

    <script>
        window.ticketflowRegistros = @json(
            $users->pluck('name', 'id')
        );
    </script>

@endpush
