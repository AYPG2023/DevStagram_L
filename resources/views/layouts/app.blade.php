<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        <title>DevStagram - @yield('titulo')</title>
        <script src="{{ asset('js/app.js')}}" defer+></script>
        @vite('resources/css/app.css')
    </head>
    <body class="bg-gray-100">
        <header class="p-5 border-b bg-white shadow"> <!-- funciona para hacer una sombra en la navegancio o barra. -->
         <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-black">
                DevStagram
            </h1>

            <nav class="flex gap-2 items-center">
                <a class="font-bold uppercase text-gray-600 text-sm" href="#">Login</a>
                <a class="font-bold uppercase text-gray-600 text-sm" href="crear-cuenta">Crear Cuenta</a>
            </nav>
         </div>
        </header>

        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">
                @yield('titulo')
            </h2>

        </main>
        @yield('contenido')
        <footer class="text-center p-5 text-gray-500 font-bold uppercase"> <!-- Funciona para hacer un pie de pagina hace que las letras se centren y teng sombra-->
            DevStagram - Todos los derechos reservados. {{ now()->year}}  <!--Funciona para imprimir el año. por medio de pho sellan helpers -->
        </footer>
    </body>
</html>
     