<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Orden;
use App\Models\CompletarOrden;
use App\Models\Certificado;
use App\Models\Ingresos;
use App\Models\Egresos;
use App\Models\Remisiones;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class PdfsGastosController extends Controller
{
    public function generarPDFIngreso(){
        $data = Ingresos ::all()->where('dataIngreso', 'Caja');

        $dataCO = CompletarOrden::select([
            'completarordenes.*',
            'orden.date1',
            'clientes.name',
            'clientes.lastname1',
            'clientes.lastname2',
        ])
        ->join('orden', 'completarordenes.id_orden', '=', 'orden.id')
        ->join('clientes', 'orden.id_cliente', '=', 'clientes.id')
        ->get();

        // Obtener la suma total de 'pago' de CompletarOrden
        $totalPagos = CompletarOrden::where('requiere3', 'Pagado')->sum('pago');

        // Obtener la suma total de 'montoIngreso' de Ingresos
        $totalIngresosAdicionales = Ingresos::where('dataIngreso', 'Caja')->sum('montoIngreso');

        $totalCaja = $totalPagos + $totalIngresosAdicionales;
    
        
        /* Imagen Del Logo */
        $path = public_path('img/membretadoFumi.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data_img = file_get_contents($path);
        $base64 = 'data:image/'.$type.';base64,'.base64_encode($data_img);
        //dd($base64);
        //$pdf_data = compact('data','clientes','base64');
        $pdf_data = compact('base64','data','dataCO','totalCaja');        
        $pdf = Pdf::loadView('reports.repoIngresos',$pdf_data);
        return $pdf->stream();
        return $pdf->download('invoice.pdf');
    }


    public function generarPDFEgreso(){

        $dataEg = Egresos ::select([
            'egresos.*',
            'comercios.comercio',
        ])
        ->join('comercios', 'egresos.id_departamento1', '=', 'comercios.id')
        ->where('dataEgresos', 'Caja')
        ->get();

        $totalEgresos = Egresos::where('dataEgresos', 'Caja')->sum('montoEgresos');

    
        
        /* Imagen Del Logo */
        $path = public_path('img/membretadoFumi.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data_img = file_get_contents($path);
        $base64 = 'data:image/'.$type.';base64,'.base64_encode($data_img);
        //dd($base64);
        //$pdf_data = compact('data','clientes','base64');
        $pdf_data = compact('base64','dataEg','totalEgresos');
        $pdf = Pdf::loadView('reports.repoEgreso',$pdf_data);
        return $pdf->stream();
        return $pdf->download('invoice.pdf');
    }


    public function generarPDFSaldo(){
        $data = Ingresos ::all()->where('dataIngreso', 'Caja');

        $dataCO = CompletarOrden::select([
            'completarordenes.*',
            'orden.date1',
            'clientes.name',
            'clientes.lastname1',
            'clientes.lastname2',
        ])
        ->join('orden', 'completarordenes.id_orden', '=', 'orden.id')
        ->join('clientes', 'orden.id_cliente', '=', 'clientes.id')
        ->get();

        // Obtener la suma total de 'pago' de CompletarOrden
        $totalPagos = CompletarOrden::where('requiere3', 'Pagado')->sum('pago');

        // Obtener la suma total de 'montoIngreso' de Ingresos
        $totalIngresosAdicionales = Ingresos::where('dataIngreso', 'Caja')->sum('montoIngreso');

        $totalCaja = $totalPagos + $totalIngresosAdicionales;

        $dataEg = Egresos ::select([
            'egresos.*',
            'comercios.comercio',
        ])
        ->join('comercios', 'egresos.id_departamento1', '=', 'comercios.id')
        ->where('dataEgresos', 'Caja')
        ->get();

        $totalEgresos = Egresos::where('dataEgresos', 'Caja')->sum('montoEgresos');


        $totalSaldo = $totalCaja - $totalEgresos;
    
        
        /* Imagen Del Logo */
        $path = public_path('img/membretadoFumi.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data_img = file_get_contents($path);
        $base64 = 'data:image/'.$type.';base64,'.base64_encode($data_img);
        //dd($base64);
        //$pdf_data = compact('data','clientes','base64');
        $pdf_data = compact('base64','data','dataCO','totalCaja','dataEg','totalEgresos','totalSaldo');
        $pdf = Pdf::loadView('reports.repoSaldo',$pdf_data);
        return $pdf->stream();
        return $pdf->download('invoice.pdf');
    }


    

}
