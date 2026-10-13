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