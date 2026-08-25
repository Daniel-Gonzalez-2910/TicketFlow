<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController; 


//Route::get('/', [TicketController::class, 'index']);

Route::get('/tickets', [TicketController::class, 'index']);

Route::get('/tickets/crear', [TicketController::class, 'create']);


