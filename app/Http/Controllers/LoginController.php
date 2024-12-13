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
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Intentar autenticar al usuario
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('mensaje', 'Credenciales incorrectas');
        }
    
        // Redirigir al muro del usuario autenticado
        return redirect()->route('posts.index', ['user' => auth()->user()->username]);
    }    
}
