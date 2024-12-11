<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index () {
        dd(auth()->user()); // Ayuda para saber si un usuario esta autenticado 
    }
}
