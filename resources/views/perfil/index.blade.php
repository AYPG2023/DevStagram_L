@extends('layouts.app')

@section('titulo')
    Editar perfil: {{ auth()->user()->username }}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white p-6 shadow">
            <form method="POST" action="{{ route('perfil.store') }}" enctype="multipart/form-data" class="mt-10 md:mt-0">
                @csrf
                <!--Editar usuario -->
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                    <input id="username" name="username" type="text" placeholder="Edita tu usuario"
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                        value= "{{ auth()->user()->username }}"> <!--value= old funciona para que al momento que se envie el formulario y se recargue la pagina por un error se muestren los datos que se llenaron
                        antes de enviar el formulario dentro de old(va el nombre de la variable) -->
                    @error('username')
                        <!--Esto funciona para poder crear un error al momento que se este llenado el formulario y depende la validacion muestre un error -->
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <!--Editar email -->
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input id="email" name="email" type="email" placeholder="Ingresa tu email"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                        value= "{{ auth()->user()->email }}">
                    @error('email')
                        <!--Esto funciona para poder crear un error al momento que se este llenado el formulario y depende la validacion muestre un error -->
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Contraseña actual -->
                <div class="mb-5">
                    <label for="current_password" class="mb-2 block uppercase text-gray-500 font-bold">Contraseña
                        Actual</label>
                    <input id="current_password" name="current_password" type="password"
                        placeholder="Ingresa tu contraseña actual"
                        class="border p-3 w-full rounded-lg @error('current_password') border-red-500 @enderror">
                    @error('current_password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nueva contraseña -->
                <div class="mb-5">
                    <label for="new_password" class="mb-2 block uppercase text-gray-500 font-bold">Nueva Contraseña</label>
                    <input id="new_password" name="new_password" type="password" placeholder="Ingresa tu nueva contraseña"
                        class="border p-3 w-full rounded-lg @error('new_password') border-red-500 @enderror">
                    @error('new_password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirmar nueva contraseña -->
                <div class="mb-5">
                    <label for="new_password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Confirmar
                        Nueva Contraseña</label>
                    <input id="new_password_confirmation" name="new_password_confirmation" type="password"
                        placeholder="Confirma tu nueva contraseña" class="border p-3 w-full rounded-lg">
                </div>
                <!--Agregar Imagen -->
                <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">Imagen de perfil</label>
                    <input id="imagen" name="imagen" type="file" class="border p-3 w-full rounded-lg" value= ""
                        accept=".jpg, .jpeg, .png">
                </div>
                <input type="submit" value="Guardar Cambios"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection
