<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\saveNames;
use App\Http\Controllers\accesController;
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

// Pagina Principal
Route::get('/',[HomeController::class, 'index'])->name('index');

// Usser Rutas (inicio de sesion)
Route::get('/register', [RegisterController::class,'show'] )->name('registershow');
Route::post('/register', [RegisterController::class,'register'] )->name('register');
Route::get('/inicioSesion',[LoginController::class,'inicioSesion'] )->name('sesionStar');
Route::post('/inicioSesion',[LoginController::class,'iniciarSesion'] )->name('getSesion');
Route::get('/cerrarSesion',[LoginController::class,'cerrarSesion'] )->name('cerrarSesion');


// Pagina de inicio 
Route::get('/homepage',[HomeController::class, 'home'])->name('home');

// Relacionado con archivos
Route::get( '/subirArchivo', [FilesController::class,'subirArchivo'] )->middleware('can:subirArchivo')->name('subirArchivo');
Route::post('/subirArchivo',[FilesController::class,'guardarArchivos'] )->middleware('can:subirArchivo')->name('guardarArchivos');

Route::get( '/viewFile', [FilesController::class,'viewFile'] )->middleware('can:buscar')->name('viewFile');
Route::get( '/buscador', [FilesController::class,'buscador'] )->middleware('can:buscar')->name('buscador');
Route::post('/buscarArchivo',[FilesController::class,'buscarArchivo'] )->middleware('can:buscar')->name('buscarArchivo');


// Subir nombre de funciones y Variables
Route::get( '/saveNames', [saveNames::class,'saveNames'] )->middleware('can:subirVariable')->name('saveNames');
Route::post( '/saveNamesP', [saveNames::class,'saveNamesP'] )->middleware('can:subirVariable')->name('saveNamesP');


//otorgar acceso 
 // retornar a la vista
 Route::get( '/permitirAcceso', [accesController::class,'permitirAcceso'] )->middleware('can:permitirAcceso')->name('permitirAcceso');
 Route::post( '/permitirAcceso', [accesController::class,'otorgarRol'] )->middleware('can:permitirAcceso')->name('otorgarRol');