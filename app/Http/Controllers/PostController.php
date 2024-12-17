<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        // Middleware para verificar autenticación
        $this->middleware('auth')->except(['show', 'index']); //Esto funciona para decir que pagina puede entrar sin necesidad de estar googleados   
    }

    public function index(User $user)
    {
        $posts = Post::where('user_id', $user->id)->paginate(8);  // paginate funciona para hacer paginacion en las publicaciones 
        // Vista del muro/dashboard
        return view('dashboard', [
            'user'=> $user,
            'posts'=> $posts
        ]);
    }

    public function create (){
        return view('posts.create');
    }

    public function store (Request $request){
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);

       /*  Post::create([
            'titulo'=> $request ->titulo,
            'descripcion'=> $request ->descripcion,
            'imagen'=> $request ->imagen,
            'user_id' => auth()->user()->id
        ]); */

        //Otras forma de hacer la creacion del posts y se cargue a la data 


        $request->user()->posts()->create([
            'titulo'=> $request ->titulo,
            'descripcion'=> $request ->descripcion,
            'imagen'=> $request ->imagen,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('posts.index', auth()->user()->username);
    }

    public function show(User $user, Post $post){
        return view('posts.show',[
            'post' => $post,
            'user' => $user,
    ]);

    }
    public function principal()
    {
        return view('principal');
    }
    
    public function destroy(Post $post)
    {
        dd('Eliminando', $post->id);
    }

}
