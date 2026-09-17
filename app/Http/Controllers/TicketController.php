<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// importamos nuestro modelo Ticket para poder usarlo en nuestro controlador
use App\Models\Ticket;

class TicketController extends Controller
{
    public function index() //La función se llama tal cual index por convencion de Laravel, para que sepa que es la función principal de la ruta
    {
        $tickets = Ticket::all(); //Se obtiene todos los tickets de la base de datos y se guarda en la variable $tickets
        //Adicional, este return view se localiza en la carpeta resources/views/tickets/index.blade.php, que es donde se encuentra la vista que se va a mostrar al usuario
        //return view('tickets.index');
        return $tickets; 
    }

    public function create() //La función se llama tal cual create por convencion de Laravel, para que sepa que es la función principal de la ruta
    {
        //Adicional, este return view se localiza en la carpeta resources/views/tickets/crear.blade.php, que es donde se encuentra la vista que se va a mostrar al usuario
        return view('tickets.crear');
    }
}
