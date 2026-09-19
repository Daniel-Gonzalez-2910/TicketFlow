<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller{

    public function create(){
         // Mostrar formulario
        return view('tickets.altaUsuario');
    }

    public function store(Request $request){
        // Validar datos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            //'password' => 'required|string|min:8|confirmed',
        ]);

        // Crear usuario
        //88. Asignación masiva
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Redirigir o devolver respuesta
        //87. Insertar modelos
        $user->save();

        return $user;
    }    

}
