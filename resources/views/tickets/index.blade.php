@extends('layouts.app')

@section('title', 'Tickets')

@section('content')

    <div>

        <h1>Tickets</h1>

        @if (session('success'))
            <x-alert :mensaje="session('success')" tipo="exito" />
        @endif

        {{-- Crear un nuevo ticket --}}
        <a href="{{ route('tickets.create') }}" class="btn btn-primary">
            Crear Ticket
        </a>

        <ul>

            @forelse ($tickets as $ticket)
                <li class="ticket-item">

                    <span>
                        {{ $loop->iteration }}.
                    </span>

                    {{-- Título del ticket --}}
                    <a href="{{ route('tickets.show', $ticket->id) }}">
                        {{ $ticket->titulo }}
                    </a>

                    @if ($ticket->estado === 'abierto')
                        <span class="estado-abierto">
                            Abierto
                        </span>
                    @else
                        <span class="estado-cerrado">
                            Cerrado
                        </span>
                    @endif

                    @switch($ticket->prioridad)
                        @case('alta')
                            <span class="prioridad prioridad-alta">
                                Alta
                            </span>
                        @break

                        @case('media')
                            <span class="prioridad prioridad-media">
                                Media
                            </span>
                        @break

                        @case('baja')
                            <span class="prioridad prioridad-baja">
                                Baja
                            </span>
                        @break
                    @endswitch

                    {{-- Acciones del ticket --}}
                    <div class="ticket-actions">

                        <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-secondary">
                            Editar
                        </a>

                        <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" class="form-eliminar"
                            data-id="{{ $ticket->id }}" data-tipo="ticket">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">
                                Eliminar
                            </button>
                        </form>

                    </div>

                </li>
                @empty
                    <li>No hay tickets registrados.</li>
                @endforelse

            </ul>

        </div>

    @endsection

    @push('scripts')
        <script>
            window.ticketflowRegistros = @json($tickets->pluck('titulo', 'id'));
        </script>
    @endpush
