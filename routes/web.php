<?php

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
    return view('principal');
});

Route::get ('/crear-cuenta',[RegisterController::class, 'index'])->name('register'); /*Esto funciona para que al momento que se quieran cambiar las rutas el nombre de la ruta se le coloque solo un nombre a la variable y se pueda poner y cambiar solo el contendido de adentro de get*/
Route::post('/crear-cuenta',[RegisterController::class, 'store']);  /* Esto funciona para crear el enpoint que se tendra que utlizar al crear la peticion*/