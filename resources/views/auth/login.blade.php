@extends('layouts.app')

@section('titulo')
    Inicio de Sesión en DevStagram
@endsection

@section('contenido')
<div class="md:flex md:justify-center md:gap-10 md:items-center "> <!--p-5 es el paddign  --> 
    <div class="md:w-6/12 ">
        <img src="{{ asset('img/login.jpg')}}" alt="Imagen de login de usuario">
    </div>
    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl"> <!--Crea una sombra shadow -->
        <form method="POST" action="{{'login'}}" novalidate>  <!--Esto funciona para que este formulario tenga una accion y se pueda cargar la infor desde las peticiones tipo post-->
           @csrf <!--Esto hace que se comniqyue perfectamente con las peticiones -->

           @if (session('mensaje'))
           <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{session('mensaje')}}</p>  
           @endif
            <div class="mb-5">
                <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                <input id="email" name="email" type="email" placeholder="Ingresa tu email" class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror" 
                value= "{{old('email')}}">
                @error('email') <!--Esto funciona para poder crear un error al momento que se este llenado el formulario y depende la validacion muestre un error -->
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                <input id="password" name="password" type="password" placeholder="Ingresa tu password" class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror" 
                >
                @error('password') <!--Esto funciona para poder crear un error al momento que se este llenado el formulario y depende la validacion muestre un error -->
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
            <input type="submit" value="Iniciar Sesión" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
        </form>
    </div>
</div>
@endsection