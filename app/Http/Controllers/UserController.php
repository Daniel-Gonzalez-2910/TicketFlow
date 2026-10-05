<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller{

    //---------------------INDEX (Muestra la lista de todos los usuarios)----------------------
    public function index(){
        $users = User::all();
        return view('users.index', compact('users'));
    }

    //---------------------CREATE (Muestra el formulario para crear un nuevo usuario)----------------------
    public function create(){
        return view('users.create');
    }

    //---------------------STORE (Crea un nuevo usuario)----------------------
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente.');
    }

    //---------------------SHOW (Muestra los detalles de un usuario específico)----------------------
    public function show(User $user){
        return view('users.show', compact('user'));
    }

    //---------------------EDIT (Muestra el formulario para editar un usuario existente)----------------------
    public function edit(User $user){
        return view('users.edit', compact('user'));
    }

    //---------------------UPDATE (Actualiza un usuario existente)----------------------
    public function update(Request $request, User $user){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    //---------------------DESTROY (Elimina un usuario existente)----------------------
    public function destroy(User $user){
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
    }   

}

//Vistas que solicita el controlador UserController:
// index.blade.php  
// create.blade.php
// show.blade.php
// edit.blade.php