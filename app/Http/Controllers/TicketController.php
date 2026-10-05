<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// importamos nuestro modelo Ticket para poder usarlo en nuestro controlador
use App\Models\Ticket;
use App\Models\User;

class TicketController extends Controller{
    
    // Consultar todos los tickets
    public function index()
    {
        $tickets = Ticket::all();

        return view('tickets.index', compact('tickets'));
    }

    // Mostrar formulario para crear un ticket
    public function create()
    {
        $usuarios = User::all();

        return view('tickets.create', compact('usuarios'));
    }

    // Validar y guardar un nuevo ticket
    public function store(Request $request)
    {
        $datosValidados = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'prioridad' => 'required|in:baja,media,alta',
            'user_id' => 'required|exists:users,id',
        ]);

        Ticket::create($datosValidados);

        return redirect()->route('tickets.index');
    }

    // Mostrar un ticket específico
    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }

    // Mostrar formulario para editar un ticket
    public function edit(Ticket $ticket)
    {
        $usuarios = User::all();

        return view(
            'tickets.edit',
            compact('ticket', 'usuarios')
        );
    }

    // Validar y actualizar un ticket
    public function update(Request $request, Ticket $ticket)
    {
        $datosValidados = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'prioridad' => 'required|in:baja,media,alta',
            'user_id' => 'required|exists:users,id',
            'estado' => 'sometimes|in:abierto,cerrado',
        ]);

        $ticket->update($datosValidados);

        return redirect()->route('tickets.index');
    }

    // Eliminar un ticket
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('tickets.index');
    }
}


//Vistas que solicita el controlador TicketController:
// index.blade.php
// create.blade.php
// show.blade.php 
// edit.blade.php   