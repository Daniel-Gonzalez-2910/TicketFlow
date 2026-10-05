<div>

    {{-- Título de la página --}}
    <h1>Detalles del Ticket</h1>


    {{-- ==================== TÍTULO ==================== --}}

    {{--
        $ticket viene desde el método show()
        del TicketController.
    --}}
    <p>
        <strong>Título:</strong>
        {{ $ticket->titulo }}
    </p>


    {{-- ================= DESCRIPCIÓN ================= --}}

    <p>
        <strong>Descripción:</strong>
        {{ $ticket->descripcion }}
    </p>


    {{-- ================= PRIORIDAD ================= --}}

    <p>
        <strong>Prioridad:</strong>
        {{ $ticket->prioridad }}
    </p>


    {{-- ==================== ESTADO ==================== --}}

    <p>
        <strong>Estado:</strong>
        {{ $ticket->estado }}
    </p>


    {{-- ==================== USUARIO ==================== --}}

    {{--
        Por ahora mostramos el ID del usuario relacionado.

        Más adelante, cuando trabajemos las relaciones
        entre los modelos Ticket y User, podremos mostrar
        directamente el nombre del usuario.
    --}}
    <p>
        <strong>ID del usuario:</strong>
        {{ $ticket->user_id }}
    </p>


    {{-- ==================== EDITAR ==================== --}}

    {{--
        Enviamos el ID del ticket a la ruta tickets.edit.

        Ejemplo:
        /tickets/15/edit
    --}}
    <a href="{{ route('tickets.edit', $ticket->id) }}">
        Editar
    </a>


    {{-- ==================== ELIMINAR ==================== --}}

    {{--
        HTML no permite enviar DELETE directamente.

        Por eso utilizamos POST y Laravel transforma
        la petición mediante @method('DELETE').
    --}}
    <form
        action="{{ route('tickets.destroy', $ticket->id) }}"
        method="POST"
    >

        {{-- Token de seguridad --}}
        @csrf

        {{-- Indica que realmente queremos realizar DELETE --}}
        @method('DELETE')

        <button type="submit">
            Eliminar
        </button>

    </form>


    {{-- ==================== REGRESAR ==================== --}}

    <a href="{{ route('tickets.index') }}">
        Volver a Tickets
    </a>

</div>