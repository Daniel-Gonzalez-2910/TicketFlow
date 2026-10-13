@extends('layouts.app')

@section('title', 'Tickets')

@section('content')

    <div>

        <h1>Tickets</h1>

        <a href="{{ route('tickets.create') }}">
            Crear Ticket
        </a>

        <ul>

            @foreach ($tickets as $ticket)

                <li>

                    <a href="{{ route('tickets.show', $ticket->id) }}">
                        {{ $ticket->titulo }}
                    </a>

                    <a href="{{ route('tickets.edit', $ticket->id) }}">
                        Editar
                    </a>

                    <form
                        action="{{ route('tickets.destroy', $ticket->id) }}"
                        method="POST"
                    >

                        @csrf
                        @method('DELETE')

                        <button type="submit">
                            Eliminar
                        </button>

                    </form>

                </li>

            @endforeach

        </ul>

    </div>

@endsection