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
use App\Models\Certificado;
use App\Models\Facturas;
use App\Models\Remisiones;
use App\Models\ordenCompra;
use Validator;

class AdminController extends Controller
{
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
        $totalCertificados = Certificado::count();
        $totalFacturas = Facturas::count();
        $totalRemisiones = Remisiones::count();
        $totalOrdenCompra = ordenCompra::count();


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
            'totalOrdenesCompletadas' => $totalOrdenesCompletadas,
            'totalCertificados' => $totalCertificados,
            'totalFacturas' => $totalFacturas,
            'totalRemisiones' => $totalRemisiones,
            'totalOrdenCompra' => $totalOrdenCompra
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
            ->where('orden.infoorden_facturacion','=','No')
            ->sum('pago');
        $totalCreditosSinFactura = CompletarOrden::
            select('completarordenes.*',
            'clientes.tradename')
            ->join('orden', 'completarordenes.id_orden', '=', 'orden.id')
            ->join('clientes', 'orden.id_cliente', '=', 'clientes.id')
            ->where('completarordenes.requiere3', 'Credito')
            ->where('orden.infoorden_facturacion','=', 'No')
            ->sum('pago');
        $totalCreditosConFactura = CompletarOrden::
            select('completarordenes.*',
            'clientes.tradename')
            ->join('orden', 'completarordenes.id_orden', '=', 'orden.id')
            ->join('clientes', 'orden.id_cliente', '=', 'clientes.id')
            ->where('completarordenes.requiere3', 'Credito')
            ->where('orden.infoorden_facturacion', '=' ,'Si')
            ->sum('pago');
        $totalVentasConFactura = CompletarOrden::
            select('completarordenes.*',
            'clientes.tradename')
            ->join('orden', 'completarordenes.id_orden', '=', 'orden.id')
            ->join('clientes', 'orden.id_cliente', '=', 'clientes.id')
            ->where('orden.infoorden_facturacion','=','Si')
            ->sum('pago');

        // Formatear los números como decimales
        $totalPagosFormateado = number_format($totalPagos, 2, '.', ',');
        $totalCreditosFormateado = number_format($totalCreditos, 2, '.', ',');
        $totalVentasSinFacturaFormateado = number_format($totalVentasSinFactura, 2, '.', ',');
        $totalCreditosSinFacturaFormateado = number_format($totalCreditosSinFactura, 2, '.', ',');
        $totalCreditosConFacturaFormateado = number_format($totalCreditosConFactura, 2, '.', ',');
        $totalVentasConFacturaFormateado = number_format($totalVentasConFactura, 2, '.', ',');

        return response()->json([
            'totalPagos' => $totalPagosFormateado,
            'totalCreditos' => $totalCreditosFormateado,
            'totalVentasSinFactura' => $totalVentasSinFacturaFormateado,
            'totalCreditosSinFactura' => $totalCreditosSinFacturaFormateado,
            'totalCreditosConFactura' => $totalCreditosConFacturaFormateado,
            'totalVentasConFactura' => $totalVentasConFacturaFormateado
        ]);
    }

    public function totalCaja()
{
    /*INGRESOS TOTALES*/ 
    $totalPagos = CompletarOrden::where('requiere3', 'Pagado')->sum('pago');
    $totalIngresosAdicionales = Ingresos::where('dataIngreso', 'Caja')->sum('montoIngreso');
    $totalBancoIngreso= Ingresos::where('dataIngreso', 'Banco')->sum('montoIngreso');
    $totalCaja = $totalPagos + $totalIngresosAdicionales;
    
    /*EGRESOS*/
    $totalEgresos = Egresos::where('dataEgresos', 'Caja')->sum('montoEgresos');
    $totalBancosEgresos = Egresos::where('dataEgresos', 'Banco')->sum('montoEgresos');
    $totalDepositoEgresos = Egresos::where('dataEgresos', 'Deposito')->sum('montoEgresos');
    /*CAJA*/
    
    /*BANCO*/
    $totalCajaEgreso = $totalEgresos + $totalDepositoEgresos;
    
    $totalCajaBanco = $totalBancoIngreso + $totalDepositoEgresos;

    $totalSaldoBanco = $totalCajaBanco - $totalBancosEgresos;

    $totalSaldo = $totalCaja - $totalCajaEgreso;
    


    // Formatear los números como decimales
    $totalCajaFormateado = number_format($totalCaja, 2, '.', ',');
    $totalEgresosFormateado = number_format($totalEgresos, 2, '.', ',');
    $totalSaldoFormateado = number_format($totalSaldo, 2, '.', ',');
    $totalBancoIngresoFormateado = number_format($totalBancoIngreso, 2, '.', ',');
    $totalBancoEgresoFormateado = number_format($totalBancosEgresos, 2, '.', ',');
    $totalSaldoBancoFormateado = number_format($totalSaldoBanco, 2, '.', ',');
    $totalCajaBancoFormateado = number_format($totalCajaBanco, 2, '.', ',');
    $totalCajaEgresoFormateado = number_format($totalCajaEgreso, 2, '.', ',');

    return response()->json([
        'totalIngresos' => $totalCajaFormateado,
        'totalEgresos' => $totalEgresosFormateado,
        'totalSaldo' => $totalSaldoFormateado,
        'totalBancoIngreso' => $totalBancoIngresoFormateado,
        'totalBancoEgreso' => $totalBancoEgresoFormateado,
        'totalSaldoBanco' => $totalSaldoBancoFormateado,
        'totalCajaBanco' => $totalCajaBancoFormateado,
        'totalCajaEgreso' => $totalCajaEgresoFormateado,
    ]);
}
}
