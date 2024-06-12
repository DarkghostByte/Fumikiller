<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\OrdensController;
use App\Http\Controllers\CiudadesController;
use App\Http\Controllers\ColoniasController;
use App\Http\Controllers\CompletarOrdenesController;
use App\Http\Controllers\ComerciosController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//RUTAS PARA CONSULTAS
Route::resource('clientes', ClientesController::class);
Route::resource('orden', OrdensController::class);
Route::resource('ciudades', CiudadesController::class);
Route::resource('colonias', ColoniasController::class);
Route::resource('completarOrden', CompletarOrdenesController::class);
Route::resource('comercios', ComerciosController::class);

//RUTAS PARA PDF
Route::get('/certificado/{id}',[ClientesController::class,'generarPDF']);
Route::get('/remision/{id}',[ClientesController::class,'generarPDFRem']);
Route::get('/orden-de-trabajo/{id_cliente}/{id}',[ClientesController::class,'generarOrden']);

//VER OPCIONES
Route::get('/verCiudades',[ClientesController::class,'verCiudades']);
Route::get('/verColonia',[ClientesController::class,'verColonia']);
Route::get('/verComercio',[ClientesController::class,'verComercio']);

//RUTA PARA LA MODIFICACION
//Route::patch('clientes/{id}', [ClientesController::class, 'update']);verColonia