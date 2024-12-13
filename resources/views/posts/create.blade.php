@extends('layouts.app')

@section('titulo')
    Crea una nueva Publicación
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form 
            action="{{route('imagenes.store')}}" 
            method="POST"
            enctype="multipart/form-data"
            id="dropzone" 
            class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center"
        >@csrf</form>        
        </div>
        <div class="md:w-1/2 p-10  bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{route('register')}}" method="POST" novalidate>  <!--Esto funciona para que este formulario tenga una accion y se pueda cargar la infor desde las peticiones tipo post-->
                @csrf <!--Esto hace que se comniqyue perfectamente con las peticiones -->
                 <div class="mb-5">
                     <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">Titulo</label>
                     <input id="titulo" name="titulo" type="text" placeholder="Titulo de la Publicación" class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" 
                     value= "{{old('titulo')}}" > <!--value= old funciona para que al momento que se envie el formulario y se recargue la pagina por un error se muestren los datos que se llenaron 
                     antes de enviar el formulario dentro de old(va el nombre de la variable) -->
                     @error('titulo') <!--Esto funciona para poder crear un error al momento que se este llenado el formulario y depende la validacion muestre un error -->
                         <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                     @enderror
                 </div>
                 <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">Descripción</label>
                    <textarea 
                        id="descripcion" 
                        name="descripcion" 
                        placeholder="Descripcion de la Publicación" 
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                    >{{ old('descripcion') }}</textarea> 
                    @error('descripcion')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <input type="submit" 
                value="Publicar"
                 class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer 
                 uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection
