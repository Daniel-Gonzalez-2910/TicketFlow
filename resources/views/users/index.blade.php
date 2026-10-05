<div>

    {{-- Título de la página --}}
    <h1>Usuarios</h1>


    {{--
        Enlace para ir al formulario de creación.

        route('users.create'):
        Busca la ruta que tiene el nombre "users.create".
    --}}
    <a href="{{ route('users.create') }}">
        Crear Usuario
    </a>


    {{-- ================= LISTA DE USUARIOS ================= --}}

    <ul>

        {{--
            $users viene desde UserController.

            Recorremos todos los usuarios obtenidos
            de la base de datos.

            En cada vuelta, $user representa
            un usuario individual.
        --}}
        @forelse ($users as $user)

            <li>

                {{--
                    Nombre del usuario.

                    Además funciona como enlace hacia
                    la vista SHOW de ese usuario.

                    Ejemplo:
                    /users/5
                --}}
                <a href="{{ route('users.show', $user->id) }}">
                    {{ $user->name }}
                </a>

                {{-- Mostrar correo --}}
                - {{ $user->email }}


                {{--
                    Enlace al formulario para editar
                    este usuario específico.

                    Ejemplo:
                    /users/5/edit
                --}}
                <a href="{{ route('users.edit', $user->id) }}">
                    Editar
                </a>


                {{--
                    Formulario para eliminar al usuario.

                    HTML no permite DELETE directamente,
                    así que enviamos POST y usamos
                    @method('DELETE').
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

            </li>

        @empty

            {{--
                Esto se muestra si la colección
                de usuarios está vacía.
            --}}
            <li>
                No hay usuarios registrados.
            </li>

        @endforelse

    </ul>

</div>