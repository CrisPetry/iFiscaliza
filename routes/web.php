<?php

<<<<<<< HEAD
use App\Http\Controllers\DenunciaController;
=======
<<<<<<< HEAD
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\TipoUsuarioController;
use App\Http\Controllers\UserController;
=======
use App\Http\Controllers\DenunciaController;
>>>>>>> a7bbd61aae715af32e1b24780cbbc4e834d5c1ca
>>>>>>> 4c80a55 (projeto atualizado)
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

<<<<<<< HEAD
=======
<<<<<<< HEAD
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('usuarios', [UserController::class, 'index']);

Route::get('usuarios/create', [UserController::class, 'create']);

Route::post('usuarios/store', [UserController::class, 'store']);

Route::get('tipoUsuarios', [TipoUsuarioController::class, 'index']);

Route::get('usuarios/{id}/edit', [UserController::class, 'edit']);

Route::put('usuarios/{id}/update', [UserController::class, 'update']);



Route::get('/cidades', [CidadeController::class, 'index']);

Route::get('cidades/create', [CidadeController::class, 'create']);

Route::post('cidades/store', [CidadeController::class, 'store']);

Route::get('cidades/{id}/edit', [CidadeController::class, 'edit']);

Route::get('cidades/{id}/update', [CidadeController::class, 'update']);



Route::get('localidades/estados', [EstadoController::class, 'index']);

Route::get('localidades/estados/create', [EstadoController::class, 'create']);

Route::post('localidades/estados/store', [EstadoController::class, 'store']);

Route::get('localidades/estados/{id}/edit', [EstadoController::class, 'edit']);

Route::get('localidades/estados/{id}/update', [EstadoController::class, 'update']);
=======
>>>>>>> 4c80a55 (projeto atualizado)
Route::get('/', [DenunciaController::class, 'index']);

Route::get('/denuncias/create', [DenunciaController::class, 'create']);

Route::get('/denuncias', function () {
    return view('denuncias');
});

Route::get('/denuncia/{id?}', function ($id = null) {
    return view('denuncia', ['id' => $id]);
});
<<<<<<< HEAD
=======
>>>>>>> a7bbd61aae715af32e1b24780cbbc4e834d5c1ca
>>>>>>> 4c80a55 (projeto atualizado)
