<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function index() //La función se llama tal cual index por convencion de Laravel, para que sepa que es la función principal de la ruta
    {
        return view('tickets.index');
    }

    public function create() //La función se llama tal cual create por convencion de Laravel, para que sepa que es la función principal de la ruta
    {
        return view('tickets.crear');
    }
}
