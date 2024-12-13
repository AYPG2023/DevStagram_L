<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        // Middleware para verificar autenticación
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        // Vista del muro/dashboard
        return view('dashboard', [
            'user'=> $user
        ]);
    }

    public function create (){
        return view('posts.create');
    }
}
