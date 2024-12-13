<?php

use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('principal'); // Vista principal
});

Route::get('/crear-cuenta', [RegisterController::class, 'index'])->name('register'); // Formulario de registro
Route::post('/crear-cuenta', [RegisterController::class, 'store']); // Procesar registro

Route::get('/login', [LoginController::class, 'index'])->name('login'); // Formulario de login
Route::post('/login', [LoginController::class, 'store']); // Procesar login
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/{user:username}', [PostController::class, 'index'])->middleware('auth')->name('posts.index'); // Requiere autenticación
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::post('imagenes', [ImagenController::class, 'store'])->name('imagenes.store');