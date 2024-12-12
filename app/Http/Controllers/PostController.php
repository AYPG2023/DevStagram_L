<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        // Middleware para verificar autenticación
        $this->middleware('auth');
    }

    public function index()
    {
        // Vista del muro/dashboard
        return view('dashboard');
    }
}
