<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);  // Esto funciona para pedir autenticacion en todas las paginas
    }
    //
    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        //Modifica el Request
        $request->request->add(['username' => Str::slug($request->username)]);

       $this->validate($request, [
        'username' => ['required', 'unique:users,username,' . auth()->user()->id, 'min:3', 'max:20',
                        'not_in:twitter,editar-perfil,facebook,instagram'], // Valida que el username sea único y esté entre 3 y 20 caracteres
       ]);
       if($request->imagen){
        $imagen = $request->file('imagen');

        $nombreImagen = Str::uuid() . "." . $imagen->extension(); // Esto funciona para generar un id unico para todas las imagenes

        $imagenServidor = Image::make($imagen);
        $imagenServidor->fit(1000,1000);


        $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
        $imagenServidor ->save($imagenPath);
       } 

       //Guardar Cambios
       $usuario = User::find(auth()->user()->id);
         $usuario->username = $request->username;
            $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
                $usuario->save();

                return redirect()->route('posts.index', $usuario->username);
    }
}
