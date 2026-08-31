<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;

class TicketController extends Controller
{
    public function index() //La función se llama tal cual index por convencion de Laravel, para que sepa que es la función principal de la ruta
    {
        $users = User::get();
        return $users;
    }

    public function create() //La función se llama tal cual create por convencion de Laravel, para que sepa que es la función principal de la ruta
    {
        return view('tickets.crear');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'estado' => 'required|string|in:abierto,cerrado',
            'prioridad' => 'required|string|in:baja,media,alta',
            'user_id' => 'required|exists:users,id',
        ]);

        $ticket = Ticket::create($request->all());

        return response()->json(['message' => 'Ticket creado exitosamente', 'ticket' => $ticket], 201);
    }


}
