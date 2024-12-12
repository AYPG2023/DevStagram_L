<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        // Retorna la vista del formulario de login
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // Validación de los campos del formulario
        $this->validate($request, [
            'email' => 'required|email',   // Campo email requerido
            'password' => 'required'       // Campo contraseña requerido
        ]);

        // Autenticar al usuario
        if (!auth()->attempt($request->only('email', 'password'))) {
            return back()->with('mensaje', 'Credenciales incorrectas'); // Mensaje de error
        }

        // Redirigir al muro tras autenticación exitosa
        return redirect()->route('posts.index');
    }
}
