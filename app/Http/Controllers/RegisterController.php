<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 

class RegisterController extends Controller
{
    //
   public function index() 
   {
        return view('auth.register');
   }
   public function store(Request $request){
    // dd($request); //db es una funcion que se utliza para que muestre los datos que se estan cargando a post
     //dd($request->get('username')); | Esto funciona para validar que datos se estan enviando y con ->get.. se muestras un dato mas espesifico.

     //Validación.
     $this->validate( $request,[
          'name' => 'required|min:5',      // Esto funciona para poder validar cuales son los campos obligatorios en el formulario 
                                     // de crear cuenta tambien dentro de esa validacion se pueden agregar otras validaciones y puede mostrar mensajes poder defecto. 
                                         
     ]); 
}   // Funciona para crear un metodo tipo post y hacer consultas
}
