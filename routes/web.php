//Sección 4:
//Definición de rutas para la aplicación TicketFlow

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;

//     ..:: Autenticación de usuarios ::...
//---------------------LOGIN----------------------
//---------------------LOGOUT----------------------
//---------------------REGISTRO----------------------


//     ..:: Tickets ::...
//---------------------INDEX----------------------
Route::get('/tickets', [TicketController::class, 'index'])
    ->name('tickets.index');
//---------------------CREATE----------------------
Route::get('/tickets/create', [TicketController::class, 'create'])
    ->name('tickets.create');
//---------------------STORE----------------------
Route::post('/tickets', [TicketController::class, 'store'])
    ->name('tickets.store');
//---------------------SHOW----------------------
Route::get('/tickets/{ticket}', [TicketController::class, 'show'])
    ->name('tickets.show');
//---------------------EDIT----------------------
Route::get('/tickets/{ticket}/edit', [TicketController::class, 'edit'])
    ->name('tickets.edit');
//---------------------UPDATE----------------------
Route::put('/tickets/{ticket}', [TicketController::class, 'update'])
    ->name('tickets.update');
//---------------------DESTROY----------------------
Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])
    ->name('tickets.destroy');


//     ..:: Usuarios ::...
//---------------------INDEX----------------------
Route::get('/users', [UserController::class, 'index'])
    ->name('users.index');    
//---------------------CREATE----------------------
Route::get('/users/create', [UserController::class, 'create'])
    ->name('users.create');
//---------------------STORE----------------------
Route::post('/users', [UserController::class, 'store'])
    ->name('users.store');
//---------------------SHOW----------------------
Route::get('/users/{user}', [UserController::class, 'show'])
    ->name('users.show');
//---------------------EDIT----------------------
Route::get('/users/{user}/edit', [UserController::class, 'edit'])
    ->name('users.edit');
//---------------------UPDATE----------------------
Route::put('/users/{user}', [UserController::class, 'update'])
    ->name('users.update');
//---------------------DESTROY----------------------
Route::delete('/users/{user}', [UserController::class, 'destroy'])
    ->name('users.destroy');




