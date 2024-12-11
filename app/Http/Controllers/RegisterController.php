<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index() 
    {
        return view('auth.register'); // Retorna la vista para el formulario de registro
    }

    public function store(Request $request)
    {
        // dd($request); // db es una función que se utiliza para mostrar los datos enviados al controlador
        // dd($request->get('username')); | Esto permite ver un dato específico del formulario enviado

        // Validación.
        $this->validate($request, [
            'name' => 'required|max:30', // Valida que el nombre sea obligatorio y tenga un máximo de 30 caracteres
            'username' => 'required|unique:users|min:3|max:20', // Valida que el username sea único y esté entre 3 y 20 caracteres
            'email' => 'required|unique:users|email|max:60', // Valida que sea un email único con máximo de 60 caracteres
            'password' => 'required|confirmed|min:6', // Valida que las contraseñas coincidan y tengan al menos 6 caracteres
        ]);

        // Creación del usuario
        User::create([
            'name' => $request->name, // Asigna el valor del campo 'name' del formulario
            'username' => Str::slug($request->username), // Asigna el valor del campo 'username' del formulario
            'email' => $request->email, // Asigna el valor del campo 'email' del formulario
            'password' => Hash::make($request->password), // Encripta la contraseña antes de guardarla
        ]);

        //Autenticacion de Usuario. 
        auth()->attempt([
          'email' =>$request->email,
          'password' => $request->password
        ]);

        // Redireccionar a la página principal con un mensaje de éxito
       // return redirect('/')->with('success', 'Cuenta creada exitosamente.');
       return redirect()->route('posts.index');
    }
}

// 'required|unique:users' valida que el campo sea obligatorio y que no se repita en la tabla 'users'.
// 'required|unique:users|email|max:60' también valida que sea un email y que no supere los 60 caracteres.
