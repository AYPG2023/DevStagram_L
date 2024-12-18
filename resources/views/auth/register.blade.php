@extends('layouts.app')

@section('titulo')
    Regístrate en DevStagram
@endsection

@section('contenido')
<div class="md:flex md:justify-center md:gap-10 md:items-center "> <!--p-5 es el paddign  --> 
    <div class="md:w-6/12 ">
        <img src="{{ asset('img/registrar.jpg')}}" alt="Imagen de registro de usuario">
    </div>
    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl"> <!--Crea una sombra shadow -->
        <form action="{{route('register')}}" method="POST" novalidate>  <!--Esto funciona para que este formulario tenga una accion y se pueda cargar la infor desde las peticiones tipo post-->
           @csrf <!--Esto hace que se comniqyue perfectamente con las peticiones -->
            <div class="mb-5">
                <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                <input id="name" name="name" type="text" placeholder="Tu Nombre" class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" 
                value= "{{old('name')}}" > <!--value= old funciona para que al momento que se envie el formulario y se recargue la pagina por un error se muestren los datos que se llenaron 
                antes de enviar el formulario dentro de old(va el nombre de la variable) -->
                @error('name') <!--Esto funciona para poder crear un error al momento que se este llenado el formulario y depende la validacion muestre un error -->
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                <input id="username" name="username" type="text" placeholder="Nombre de usuario" class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror" 
                value= "{{old('username')}}" >
                @error('username') <!--Esto funciona para poder crear un error al momento que se este llenado el formulario y depende la validacion muestre un error -->
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
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
            <div class="mb-5"> <!-- Para el segundo campo de confirmacion de contraseña tienen que llevar si o si _confirmation -->
                <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repetir Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Repite tu password" class="border p-3 w-full rounded-lg">
            </div>

            <input type="submit" value="Crear Cuenta" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
        </form>
    </div>
</div>
@endsection