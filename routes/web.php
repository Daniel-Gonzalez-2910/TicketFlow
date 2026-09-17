<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return 'welcome';
});

Route::get('/tickets', [TicketController::class, 'index']);

Route::get('/tickets/crear', [TicketController::class, 'create']);

// 1. Mostrar el formulario
Route::get('/usuarios/crear', [UserController::class, 'create']);

// 2. Recibir los datos y guardar el usuario
Route::post('/usuarios', [UserController::class, 'store']);
