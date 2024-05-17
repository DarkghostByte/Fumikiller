<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\OrdensController;



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

Route::resource('clientes', ClientesController::class);
Route::resource('orden', OrdensController::class);

Route::get('/certificado/{id}',[ClientesController::class,'generarPDF']);
Route::get('/remision/{id}',[ClientesController::class,'generarPDFRem']);
Route::get('/orden-de-trabajo/{id_cliente}/{id}',[ClientesController::class,'generarOrden']);



