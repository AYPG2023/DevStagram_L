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
          'name' => 'required|max:30',      // Esto funciona para poder validar cuales son los campos obligatorios en el formulario tambien se puede poner como arreglo [n , m] 
          'username' => 'required|unique:users|min:3|max:20',  // de crear cuenta tambien dentro de esa validacion se pueden agregar otras validaciones y puede mostrar mensajes poder defecto. 
          'email' =>'required|unique:users|email|max:60',      
          'password' => 'required',                          
     ]); 
}   // Funciona para crear un metodo tipo post y hacer consultas
}



//'required|unique:users' funciona para validar en la base de datos en la tabla de usuarios que ningun otro usuario tenga ese usuario.
//required|unique:users|email|max:60 Esto valida que sea un email y que tenga una capacidad de 60 caracteres. 