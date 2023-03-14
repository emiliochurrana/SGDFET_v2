<?php

use App\Http\Controllers\DadosController;
use App\Http\Controllers\DefesaController;
use App\Http\Controllers\MonoController;
use App\Http\Controllers\UserController;
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

//GET

Route::get('/', function () {
    return view('welcome');
});
Route::get('/usuario/estudante', [UserController::class],'formAddEstudante')->name('users.formAddEstudante');
Route::get('/usuario/docentes', [UserController::class],'formAddDocente')->name('users.formAddDocente');
Route::get('/usuario/estudantes', [UserController::class],'listEstudantes')->name('users.estudanteview');
Route::get('/usuario/docentes', [UserController::class],'listDocentes')->name('users.docenteview');
Route::get('/usuario/editar/{user}', [UserController::class],'formEditDocente')->name('users.formEditDocente');
Route::get('/usuario/editar/{user}', [UserController::class],'formEditDocente')->name('users.formEditDocente');
Route::get('/monografia/{id}', [MonoController::class, 'download'])->middleware('auth');
Route::get('/monografias/{id}', [MonoController::class, 'showMonografia']);
Route::get('/defesas/{id}', [DefesaController::class, 'showDefesa']);

//POST
Route::post('/usuario/estudante', [UserController::class],'storeEstudante')->name('user.storeEstudante');
Route::post('/usuario/docente', [UserController::class],'storeDocente')->name('user.storeDocente');
Route::post('/dados', [DadosController::class, 'enviardados'])->middleware('auth');
Route::post('/monografias', [MonoController::class,'store']);
Route::post('/defesas', [DefesaController::class, 'store']);
Route::post('/dados', [DadosController::class, 'store']);
Route::post('/estudante', [UserController::class,'storeEstudante']);
Route::post('/docente', [UserController::class, 'storeDocente']);
Route::post('/admin', [UserController::class, 'storeAdmin']);
Route::delete('/monografia/{id}', [MonoController::class, 'destroy']);

//Route::get('/dashboard', [MonoController::class, 'dashboard'])->middleware('auth');

//PUT/PUTCH
Route::put('/usuario/editestudante/{user}', [UserController::class], 'editEstudante')->name('users.editestudante');
Route::put('/usuario/editdocente/{user}', [UserController::class], 'editDocente')->name('users.editdocente');


//DELETE

Route::delete('/usuario/estudante/{user}', [UserController::class], 'destroyEstudante')->name('users.destroyestudate');
Route::delete('/usuario/docente/{user}', [UserController::class], 'destroyDocente')->name('users.destroydocente');