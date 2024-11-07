<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductoInterno;
use App\Models\ProductoExterno;
use App\Models\Ciudad;
use App\Models\Colonia;
use App\Models\Problematicas;
use App\Models\Comercio;
use App\Models\Vias;
use App\Models\Empleados;
use App\Models\Cliente;
use App\Models\Orden;
use App\Models\CompletarOrden;
use App\Models\Ingresos;
use App\Models\Egresos;
use Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function totales()
    {
        $totalProductosExt = ProductoExterno::count();
        $totalProductosInt = ProductoInterno::count(); 
        $totalCiudades = Ciudad::count();  
        $totalColonias = Colonia::count();    
        $totalProblematica = Problematicas::count();
        $totalAsentamientos = Comercio::count();
        $totalVias = Vias::count();
        $totalEmpleados = Empleados::count();
        $totalClientes = Cliente::count();
        $totalOrdenes = Orden::count();
        $totalOrdenesCompletadas = CompletarOrden::count();


        return response()->json([
            'totalProductosExt' => $totalProductosExt,
            'totalProductosInt' => $totalProductosInt,
            'totalCiudades' => $totalCiudades,
            'totalColonias' => $totalColonias,
            'totalProblematica' => $totalProblematica,
            'totalAsentamientos' => $totalAsentamientos,
            'totalVias' => $totalVias,
            'totalEmpleados' => $totalEmpleados,
            'totalClientes' => $totalClientes,
            'totalOrdenes' => $totalOrdenes,
            'totalOrdenesCompletadas' => $totalOrdenesCompletadas
        ]);
    }

    public function totalDinero()
    {
        $totalPagos = CompletarOrden::sum('pago');
        $totalCreditos = CompletarOrden::where('requiere3', 'Credito')
            ->sum('pago');
        $totalVentasSinFactura = CompletarOrden::
            select('completarordenes.*',
            'clientes.tradename')
            ->join('orden', 'completarordenes.id_orden', '=', 'orden.id')
            ->join('clientes', 'orden.id_cliente', '=', 'clientes.id')
            ->where('clientes.infoclient_facturacion','=','No')
            ->sum('pago');
        $totalCreditosSinFactura = CompletarOrden::
            select('completarordenes.*',
            'clientes.tradename')
            ->join('orden', 'completarordenes.id_orden', '=', 'orden.id')
            ->join('clientes', 'orden.id_cliente', '=', 'clientes.id')
            ->where('completarordenes.requiere3', 'Credito')
            ->where('clientes.infoclient_facturacion','=', 'No')
            ->sum('pago');
        $totalCreditosConFactura = CompletarOrden::
            select('completarordenes.*',
            'clientes.tradename')
            ->join('orden', 'completarordenes.id_orden', '=', 'orden.id')
            ->join('clientes', 'orden.id_cliente', '=', 'clientes.id')
            ->where('completarordenes.requiere3', 'Credito')
            ->where('clientes.infoclient_facturacion', '=' ,'Si')
            ->sum('pago');
        $totalVentasConFactura = CompletarOrden::
            select('completarordenes.*',
            'clientes.tradename')
            ->join('orden', 'completarordenes.id_orden', '=', 'orden.id')
            ->join('clientes', 'orden.id_cliente', '=', 'clientes.id')
            ->where('clientes.infoclient_facturacion','=','Si')
            ->sum('pago');

        return response()->json([
            'totalPagos' => $totalPagos,
            'totalCreditos' => $totalCreditos,
            'totalVentasSinFactura' => $totalVentasSinFactura,
            'totalCreditosSinFactura' => $totalCreditosSinFactura,
            'totalCreditosConFactura' => $totalCreditosConFactura,
            'totalVentasConFactura' => $totalVentasConFactura
        ]);
    }

    public function totalCaja()
{
    // Obtener la suma total de 'pago' de CompletarOrden
    $totalPagos = CompletarOrden::where('requiere3', 'Pagado')->sum('pago');

    // Obtener la suma total de 'montoIngreso' de Ingresos
    $totalIngresosAdicionales = Ingresos::sum('montoIngreso');

    // Calcular el total general
    $totalCaja = $totalPagos + $totalIngresosAdicionales;

    $totalEgresos = Egresos::sum('montoEgresos');

    $totalSaldo = $totalCaja - $totalEgresos;

    // Formatear los números como decimales
    $totalCajaFormateado = number_format($totalCaja, 2, '.', ',');
    $totalEgresosFormateado = number_format($totalEgresos, 2, '.', ',');
    $totalSaldoFormateado = number_format($totalSaldo, 2, '.', ',');

    return response()->json([
        'totalIngresos' => $totalCajaFormateado,
        'totalEgresos' => $totalEgresosFormateado,
        'totalSaldo' => $totalSaldoFormateado,
    ]);
}
}
