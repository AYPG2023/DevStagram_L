@extends ('/layouts.app')

@section('titulo')
    Pagina Principal.
@endsection

@section('contenido')
    <x-Listar-post :posts="$posts"  /> <!--Funciona para poder mostrar las publicaciones de los usuarios en un componente-->
@endsection
