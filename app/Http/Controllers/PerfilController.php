<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);  // Esto funciona para pedir autenticacion en todas las paginas
    }

    public function index()
    {
        return view('perfil.index');
    }
    public function store(Request $request)
    {
        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            'username' => ['required', 'unique:users,username,' . auth()->user()->id, 'min:3', 'max:20'],
            'email' => ['required', 'email', 'unique:users,email,' . auth()->user()->id],
            'new_password' => ['nullable', 'confirmed', 'min:6'], // Validación para la nueva contraseña
            'current_password' => ['required_with:new_password', function ($attribute, $value, $fail) {
                if (!Hash::check($value, auth()->user()->password)) {
                    $fail('La contraseña actual no es correcta.');
                }
            }],
        ]);

        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->email = $request->email;

        // Actualizar la contraseña si se proporcionó una nueva
        if ($request->new_password) {
            $usuario->password = Hash::make($request->new_password);
        }

        // Procesar imagen si se subió
        if ($request->imagen) {
            $imagen = $request->file('imagen');
            $nombreImagen = Str::uuid() . "." . $imagen->extension();
            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000, 1000);
            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);
            $usuario->imagen = $nombreImagen;
        }

        $usuario->save();

        return redirect()->route('posts.index', $usuario->username);
    }
}
