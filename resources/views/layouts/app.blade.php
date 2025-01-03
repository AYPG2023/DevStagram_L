<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('styles')
        <title>DevStagram - @yield('titulo')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body class="bg-gray-100">
        <header class="p-5 border-b bg-white shadow"> <!-- funciona para hacer una sombra en la navegancio o barra. -->
         <div class="container mx-auto flex justify-between items-center">
            <a href="{{route('home')}}" class="text-3xl font-black">
                DevStagram
            </a>
            @guest
            <nav class="flex gap-2 items-center">
                <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('login')}}">Login</a>
                <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('register')}}">Crear Cuenta</a> <!--Se manda a llamar el nombre de la variable que se coloco en we,php -> name() 
                para cambiar el nombre de la vista que se mostrara ennel navegador -->
            </nav>
            @endguest
            @auth
            <nav class="flex gap-2 items-center">
                <a class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm uppercase font-bold cursor-pointer" href="{{ route('posts.create')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                    Crear</a>
                <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('posts.index', auth()->user()->username)}}">Hola: <span class="font-normal"> {{auth()->user()->username}} </span></a>
                
                <form method="POST" action="{{route('logout')}}">
                    @csrf
                <button type="submit" class="font-bold uppercase text-gray-600 text-sm">Cerrar Sesión</button> </form> <!--Se manda a llamar el nombre de la variable que se coloco en we,php -> name() 
                para cambiar el nombre de la vista que se mostrara ennel navegador -->
            </nav>                
            @endauth
         </div>
        </header>

        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">
                @yield('titulo')
            </h2>

        </main>
        @yield('contenido')
        <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase"> <!-- Funciona para hacer un pie de pagina hace que las letras se centren y teng sombra-->
            DevStagram - Todos los derechos reservados. {{ now()->year}}  <!--Funciona para imprimir el año. por medio de pho sellan helpers -->
        </footer>
   
        @livewireScripts
    </body>
</html>
     