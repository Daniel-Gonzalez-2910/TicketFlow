<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// importamos nuestro modelo Ticket para poder usarlo en nuestro controlador
use App\Models\Ticket;
use App\Models\User;

class TicketController extends Controller
{
    public function index() //La función se llama tal cual index por convencion de Laravel, para que sepa que es la función principal de la ruta
    {
        //-------------------------86: Recuperación de modelos-------------------------
        
        //$tickets = Ticket::all(); //Se obtiene todos los tickets de la base de datos y se guarda en la variable $tickets
        //Adicional, este return view se localiza en la carpeta resources/views/tickets/index.blade.php, que es donde se encuentra la vista que se va a mostrar al usuario
        //return $tickets; 

        //$ticket = Ticket::find(2);
        //return $ticket;

        //$tickets = Ticket::where('prioridad', 'alta')->get();
        //return $tickets;

        //$tickets = Ticket::where('estado', 'abierto')->get();
        //return $tickets;
        //-------------------------86: Recuperación de modelos-------------------------

        //-------------------------87: Insertar modelos-------------------------
        //$ticket = new Ticket();

        //$ticket->titulo = 'Problema con internet';
        //$ticket->descripcion = 'El equipo no tiene conexión a internet';
        //$ticket->estado = 'abierto';
        //$ticket->prioridad = 'media';
        //$ticket->user_id = 2;

        //$ticket->save();

        //return $ticket;
        //-------------------------87: Insertar modelos-------------------------
    }

    public function create() //La función se llama tal cual create por convencion de Laravel, para que sepa que es la función principal de la ruta
    {
        //Adicional, este return view se localiza en la carpeta resources/views/tickets/crear.blade.php, que es donde se encuentra la vista que se va a mostrar al usuario
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

        //88. Asignación masiva 
        //Crear el ticket usando asignación masiva 
        $ticket = Ticket::create($request->all());

        return response()->json(['message' => 'Ticket creado exitosamente', 'ticket' => $ticket], 201);
    }


}
