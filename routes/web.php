<?php
//Sección 4:
//Definición de rutas para la aplicación TicketFlow
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;

//     ..::::::: Autenticación de usuarios :::::::...
//---------------------LOGIN----------------------
//---------------------LOGOUT----------------------
//---------------------REGISTRO----------------------


//     ..::::::: Tickets :::::::...
//---------------------INDEX (Muestra la lista de todos los tickets)----------------------
Route::get('/tickets', [TicketController::class, 'index'])
    ->name('tickets.index');
//---------------------CREATE (Muestra el formulario para crear un ticket)----------------------
Route::get('/tickets/create', [TicketController::class, 'create'])
    ->name('tickets.create');
//---------------------STORE (Guarda el ticket creado)----------------------
Route::post('/tickets', [TicketController::class, 'store'])
    ->name('tickets.store');
//---------------------SHOW (Muestra los detalles de un ticket específico)----------------------
Route::get('/tickets/{ticket}', [TicketController::class, 'show'])
    ->name('tickets.show');
//---------------------EDIT (Muestra el formulario para editar un ticket)----------------------
Route::get('/tickets/{ticket}/edit', [TicketController::class, 'edit'])
    ->name('tickets.edit');
//---------------------UPDATE (Guarda los cambios realizados en un ticket)----------------------
Route::put('/tickets/{ticket}', [TicketController::class, 'update'])
    ->name('tickets.update');
//---------------------DESTROY (Elimina un ticket)----------------------
Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])
    ->name('tickets.destroy');



//     ..::::::: Usuarios :::::::...
//---------------------INDEX (Muestra la lista de todos los usuarios)----------------------
Route::get('/users', [UserController::class, 'index'])
    ->name('users.index');    
//---------------------CREATE (Muestra el formulario para crear un usuario)----------------------
Route::get('/users/create', [UserController::class, 'create'])
    ->name('users.create');
//---------------------STORE (Guarda el usuario creado)----------------------
Route::post('/users', [UserController::class, 'store'])
    ->name('users.store');
//---------------------SHOW (Muestra los detalles de un usuario específico)----------------------
Route::get('/users/{user}', [UserController::class, 'show'])
    ->name('users.show');
//---------------------EDIT (Muestra el formulario para editar un usuario)----------------------
Route::get('/users/{user}/edit', [UserController::class, 'edit'])
    ->name('users.edit');
//---------------------UPDATE (Guarda los cambios realizados en un usuario)----------------------
Route::put('/users/{user}', [UserController::class, 'update'])
    ->name('users.update');
//---------------------DESTROY (Elimina un usuario)----------------------
Route::delete('/users/{user}', [UserController::class, 'destroy'])
    ->name('users.destroy');




