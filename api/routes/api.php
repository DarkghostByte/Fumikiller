<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\OrdensController;
use App\Http\Controllers\CiudadesController;
use App\Http\Controllers\ColoniasController;
use App\Http\Controllers\CompletarOrdenesController;
use App\Http\Controllers\ComerciosController;
use App\Http\Controllers\CertificadoController;
use App\Http\Controllers\ProductosInternosController;
use App\Http\Controllers\ProductosExtrenosController;
use App\Http\Controllers\EmpleadosController;

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
Route::resource('certificados', CertificadoController::class);
Route::resource('productosInternos', ProductosInternosController::class);
Route::resource('productosExternos', ProductosExtrenosController::class);
Route::resource('empleados', EmpleadosController::class);

//RUTAS PARA PDF
Route::get('/certificado/{id}',[ClientesController::class,'generarPDF']);
Route::get('/certificado1/{id}',[CompletarOrdenesController::class,'generarCertificado']);
Route::get('/certificadoRealizado/{id}',[CertificadoController::class,'generarCertificado']);
Route::get('/remision/{id}',[ClientesController::class,'generarPDFRem']);
Route::get('/ordenTrabajoCompleta/{id}',[CompletarOrdenesController::class,'generarOrden']);
Route::get('/ordenTrabajo/{id}',[OrdensController::class,'generarOrdenPDF']);
Route::get('/ventsinfact',[CompletarOrdenesController::class,'generarVentSinFact']);
Route::get('/ventconfact',[CompletarOrdenesController::class,'generarVentConFact']);
Route::get('/ventatotales',[CompletarOrdenesController::class,'generarVentasTotales']);
Route::get('/creditos',[CompletarOrdenesController::class,'generarCreditos']);
Route::get('/creditossinfactura',[CompletarOrdenesController::class,'generarCreditosSinFactura']);
Route::get('/creditosconfactura',[CompletarOrdenesController::class,'generarCreditosConFactura']);


//VER OPCIONES
Route::get('/verCiudades',[CiudadesController::class,'verCiudades']);
Route::get('/verColonia',[ColoniasController::class,'verColonia']);
Route::get('/verComercio',[ComerciosController::class,'verComercio']);
Route::get('/verColoniaPorCiudad/{cityId}', [ColoniasController::class, 'verColoniaPorCiudad']);
Route::get('/verProductosInternos',[ProductosInternosController::class,'verProductosInternos']);
Route::get('/verProductosExternos',[ProductosExtrenosController::class,'verProductosExternos']);
Route::get('/verEmpleados',[EmpleadosController::class,'verEmpleados']);


//CONTEOS
Route::get('/totalPagos', [CompletarOrdenesController::class, 'totalPagos']);
Route::get('/totalVentasSinFactura', [CompletarOrdenesController::class, 'totalVentasSinFactura']);
Route::get('/totalVentasConFactura', [CompletarOrdenesController::class, 'totalVentasConFactura']);
Route::get('/totalCreditos', [CompletarOrdenesController::class, 'totalCreditos']);
Route::get('/totalCreditosSinFactura', [CompletarOrdenesController::class, 'totalCreditosSinFactura']);
Route::get('/totalCreditosConFactura', [CompletarOrdenesController::class, 'totalCreditosConFactura']);
Route::get('/totalCiudades', [CiudadesController::class, 'totalCiudades']);
Route::get('/totalColonias', [ColoniasController::class, 'totalColonias']);
Route::get('/totalAsentamientos', [ComerciosController::class, 'totalAsentamientos']);
Route::get('/totalProductosInt', [ProductosInternosController::class, 'totalProductosInt']);
Route::get('/totalProductosExt', [ProductosExtrenosController::class, 'totalProductosExt']);
Route::get('/totalEmpleados', [EmpleadosController::class, 'totalEmpleados']);
Route::get('/totalClientes', [ClientesController::class, 'totalClientes']);
Route::get('/totalOrdenes', [OrdensController::class, 'totalOrdenes']);

//RUTA PARA LA MODIFICACION
Route::put('actualizarEstado/{id}', [CompletarOrdenesController::class, 'actualizarEstado']);
Route::put('desactivarCliente/{id}', [ClientesController::class, 'desactivarCliente']);
Route::put('desactivarOrden/{id}', [OrdensController::class, 'desactivarOrden']);
Route::put('verEstadoOrden/{id}', [OrdensController::class, 'verEstadoOrden']);
Route::put('desactivarProductoInterno/{id}', [ProductosInternosController::class, 'desactivarProductoInterno']);
Route::put('desactivarProductoExterno/{id}', [ProductosExtrenosController::class, 'desactivarProductoExterno']);
Route::put('desactivarEmpleado/{id}', [EmpleadosController::class, 'desactivarEmpleado']);

//FILTRO DE FECHAS DE HOME
Route::get('/completarordenes/por-fecha', [CompletarOrdenesController::class, 'completarPorFecha']);