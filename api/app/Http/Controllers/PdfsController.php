<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Orden;
use App\Models\CompletarOrden;
use App\Models\Certificado;
use App\Models\Ingresos;
use App\Models\Egresos;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class PdfsController extends Controller
{
    public function generarPDFRem(){
        /* Imagen Del Logo */
        $path = public_path('img/membretadoFumi.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data_img = file_get_contents($path);
        $base64 = 'data:image/'.$type.';base64,'.base64_encode($data_img);
        //dd($base64);
        //$pdf_data = compact('data','clientes','base64');
        $pdf_data = compact('base64');
        $pdf = Pdf::loadView('reports.repoRemision',$pdf_data);
        return $pdf->stream();
        return $pdf->download('invoice.pdf');
    }

    public function generarOrdenPDF($id){        
        // Obtener datos del cliente junto con ciudad y colonia
        $orden = Orden::select([
            'orden.*',
            'clientes.name','clientes.lastname1','clientes.lastname2','clientes.tradename','clientes.home',
            'clientes.numAddress','clientes.id_colonia','clientes.id_city','clientes.cell_phone','clientes.how_to_get',
            'clientes.description','clientes.contact_form','colonias.colonia','colonias.codigoPostal','ciudades.ciudad',
            'comercios.comercio','problematica1.problematica as plague1','problematica2.problematica as plague2',
        ])
        ->join('problematicas as problematica1', 'orden.id_plague1', '=', 'problematica1.id')
        ->join('problematicas as problematica2', 'orden.id_plague2', '=', 'problematica2.id')
        ->join('clientes', 'orden.id_cliente', '=', 'clientes.id')
        ->join('colonias', 'clientes.id_colonia', '=', 'colonias.id')
        ->join('ciudades', 'clientes.id_city', '=', 'ciudades.id')
        ->join('comercios', 'clientes.id_comercio', '=', 'comercios.id')
        ->where('orden.id', $id)->first();
        //Datos de la base de datos
        if (!$orden) {
            return abort(404);
        }
        //PDF Orden de trabajo
        /* Imagen Del Logo */
        $path = public_path('img/membretadoFumi.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data_img = file_get_contents($path);
        $base64 = 'data:image/'.$type.';base64,'.base64_encode($data_img);
        /* Fecha Date1 */
        $fecha=(strtoupper(strftime("%A,  %d de %B de %Y", strtotime($orden->date1))));
        str_replace('S?BADO','SÁBADO',$fecha);
        $fecha = Carbon::parse($orden->date1);
        /* Fecha Date2 */
        $fecha2=(strtoupper(strftime("%A,  %d de %B de %Y", strtotime($orden->date2))));
        str_replace('S?BADO','SÁBADO',$fecha2);
        $fecha2 = Carbon::parse($orden->date2);
        /* Localizacion */
        Carbon::setLocale('es');
        /* PDF */
        $pdf_data = compact('base64','orden','fecha','fecha2');
        $pdf = Pdf::loadView('reports.reporteOrdenPdf',$pdf_data)->save('myfile.pdf');
        return $pdf->stream();
    }

    public function generarOrden($id){        
        // Obtener datos del cliente junto con ciudad y colonia
        $ordenCompleta = CompletarOrden::select(
            'completarordenes.*',
            'problematica1.problematica as plague1','problematica2.problematica as plague2',
            'orden.date1','orden.date2','orden.time1','orden.time2','orden.id_cliente',
            'clientes.name','clientes.lastname1','clientes.lastname2','clientes.tradename','clientes.home',
            'clientes.numAddress','clientes.id_colonia','clientes.id_city','clientes.cell_phone','clientes.how_to_get',
            'clientes.description','clientes.contact_form','comercios.comercio','colonias.colonia','colonias.codigoPostal','ciudades.ciudad',
            'productosInternos1.productoInt as productoInt1','productosInternos2.productoInt as productoInt2',
            'productosExternos1.productoExt as productoExt1','productosExternos2.productoExt as productoExt2'
            )
            ->join('orden', 'completarordenes.id_orden', '=', 'orden.id')
            ->join('productosInternos as productosInternos1', 'completarordenes.id_productosInternos', '=', 'productosInternos1.id')
            ->join('productosInternos as productosInternos2', 'completarordenes.id_productosInternos2', '=', 'productosInternos2.id')
            ->join('productosExternos as productosExternos1', 'completarordenes.id_productosExternos', '=', 'productosExternos1.id')
            ->join('productosExternos as productosExternos2', 'completarordenes.id_productosExternos2', '=', 'productosExternos2.id')
            ->join('problematicas as problematica1', 'orden.id_plague1', '=', 'problematica1.id')
            ->join('problematicas as problematica2', 'orden.id_plague2', '=', 'problematica2.id')    
            ->join('clientes', 'orden.id_cliente', '=', 'clientes.id')
            ->join('colonias', 'clientes.id_colonia', '=', 'colonias.id')
            ->join('ciudades', 'clientes.id_city', '=', 'ciudades.id')
            ->join('comercios', 'clientes.id_comercio', '=', 'comercios.id')
            ->where('completarordenes.id', $id)
            ->first();
        //Datos de la base de datos
        if (!$ordenCompleta) {
            return abort(404);
        }
        //PDF Orden de trabajo
        /* Imagen Del Logo */
        $path = public_path('img/membretadoFumi.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data_img = file_get_contents($path);
        $base64 = 'data:image/'.$type.';base64,'.base64_encode($data_img);
        /* Fecha Date1 */
        $fecha=(strtoupper(strftime("%A,  %d de %B de %Y", strtotime($ordenCompleta->date1))));
        str_replace('S?BADO','SÁBADO',$fecha);
        $fecha = Carbon::parse($ordenCompleta->date1);
        /* Fecha Date2 */
        $fecha2=(strtoupper(strftime("%A,  %d de %B de %Y", strtotime($ordenCompleta->date2))));
        str_replace('S?BADO','SÁBADO',$fecha2);
        $fecha2 = Carbon::parse($ordenCompleta->date2);
        /* Localizacion */
        Carbon::setLocale('es');
        /* PDF */
        $pdf_data = compact('base64','ordenCompleta','fecha','fecha2');
        $pdf = Pdf::loadView('reports.reporteOrdenCompletaPDF',$pdf_data)->save('myfile.pdf');
        //$pdf = Pdf::loadView('reports.reporte',$pdf_data)->save('myfile.pdf');
        //$pdf = Pdf::loadView('reports.repoCer',$pdf_data)->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function generarCertificado($id){
        $data = Certificado::select([
            'certificados.*',
            'clientes.name',
            'clientes.lastname1',
            'clientes.lastname2',
            'clientes.tradename',
            'clientes.home',
            'clientes.numAddress',
            'clientes.id_colonia',
            'clientes.id_city',
            'clientes.id_comercio',
            'comercios.comercio',
            'clientes.cell_phone',
            'colonias.colonia',
            'colonias.codigoPostal',
            'ciudades.ciudad',
            'ciudades.estado',
            'productosInternos.productoInt',
            'productosExternos.productoExt'
        ])
        ->join('productosInternos', 'certificados.id_productoCertificadoInt1', '=', 'productosInternos.id')
        ->join('productosExternos', 'certificados.id_productoCertificadoExt1', '=', 'productosExternos.id')
        ->join('clientes', 'certificados.id_cliente', '=', 'clientes.id')
        ->join('colonias', 'clientes.id_colonia', '=', 'colonias.id')
        ->join('ciudades', 'clientes.id_city', '=', 'ciudades.id')
        ->join('comercios', 'clientes.id_comercio', '=', 'comercios.id')
        ->where('certificados.id', $id)
        ->first();
    //Datos de la base de datos
    if (!$data) {
        return abort(404);
    }
    

        /* Imagen Del Logo */
        $path = public_path('img/membretadoFumi.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data_img = file_get_contents($path);
        $base64 = 'data:image/'.$type.';base64,'.base64_encode($data_img);
        //dd($base64);
        //$pdf_data = compact('data','clientes','base64');
        setlocale(LC_ALL, 'es_MX.UTF-8','esp');
        date_default_timezone_set("America/Mexico_City"); // Establece el locale para español
        $fecha=(strtoupper(strftime("%A,  %d de %B de %Y", strtotime($data->certificateDate))));
        str_replace('S?BADO','SÁBADO',$fecha);
        $fecha = Carbon::parse($data->certificateDate);
        Carbon::setLocale('es');
        $pdf_data = compact('base64','data','fecha');
        $pdf = Pdf::loadView('reports.repoCertificadoRealizado',$pdf_data)->setPaper('a4', 'landscape');     
        //$pdf = Pdf::loadView('reports.repoCer',$pdf_data)->setPaper('a4', 'landscape');
        return $pdf->stream();
        return $pdf->download('invoice.pdf');
    }

    public function generarVentSinFact() {
        // Realizar la consulta sin filtrar por 'id_cliente'
        $data = CompletarOrden::select([
            'completarordenes.*',
            'problematica1.problematica as plague1',
            'problematica2.problematica as plague2',
            'orden.date1',
            'orden.date2',
            'orden.id_cliente',
            'clientes.name',
            'clientes.lastname1',
            'clientes.lastname2',
            'clientes.tradename',
            'clientes.home',
            'clientes.numAddress',
            'clientes.id_colonia',
            'clientes.id_city',
            'colonias.colonia',
            'colonias.codigoPostal',
            'ciudades.ciudad',
            'productosInternos1.productoInt as productoInt1',
            'productosInternos2.productoInt as productoInt2',
            'productosExternos1.productoExt as productoExt1',
            'productosExternos2.productoExt as productoExt2',
            'empleados1.nameEmpleado as nameEmpleado1',
            'empleados2.nameEmpleado as nameEmpleado2',
        ])
        ->join('orden', 'completarordenes.id_orden', '=', 'orden.id')
        ->join('productosInternos as productosInternos1', 'completarordenes.id_productosInternos', '=', 'productosInternos1.id')
        ->join('productosInternos as productosInternos2', 'completarordenes.id_productosInternos2', '=', 'productosInternos2.id')
        ->join('productosExternos as productosExternos1', 'completarordenes.id_productosExternos', '=', 'productosExternos1.id')
        ->join('productosExternos as productosExternos2', 'completarordenes.id_productosExternos2', '=', 'productosExternos2.id')
        ->join('empleados as empleados1', 'completarordenes.id_empleado', '=', 'empleados1.id')
        ->join('empleados as empleados2', 'completarordenes.id_empleado2', '=', 'empleados2.id')
        ->join('clientes', 'orden.id_cliente', '=', 'clientes.id')
        ->join('colonias', 'clientes.id_colonia', '=', 'colonias.id')
        ->join('problematicas as problematica1', 'orden.id_plague1', '=', 'problematica1.id')
        ->join('problematicas as problematica2', 'orden.id_plague2', '=', 'problematica2.id')    
        ->join('ciudades', 'clientes.id_city', '=', 'ciudades.id')
        ->where('clientes.tradename','=','Particular')
        ->orderBy('completarordenes.id', 'DESC')
        ->get();

        //Funcion para las fechas
        foreach ($data as &$item) {
            $item->date1 = Carbon::parse($item->date1)->format('d-m-Y');
            $item->date2 = Carbon::parse($item->date2)->format('d-m-Y'); // Ajusta el formato según tus necesidades
        }
    
        // Verificar si la colección está vacía
        if ($data->isEmpty()) {
            return abort(404, 'No se encontraron datos.');
        }
    
        // Sumar todos los pagos
        $totalPago = $data->sum('pago');
    
        // Generación del PDF
        /* Imagen Del Logo */
        $path = public_path('img/membretadoFumi.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data_img = file_get_contents($path);
        $base64 = 'data:image/'.$type.';base64,'.base64_encode($data_img);
    
        // Preparar los datos para la vista del PDF
        $pdf_data = compact('base64', 'data', 'totalPago'); // Incluimos $totalPago
        $pdf = Pdf::loadView('reports.repoVentaSinFact', $pdf_data)->save('myfile.pdf');
    
        // Mostrar el PDF al usuario
        return $pdf->stream();
    }
    

    public function generarVentConFact() {
        // Realizar la consulta sin filtrar por 'id_cliente'
        $data = CompletarOrden::select([
            'completarordenes.*',
            'problematica1.problematica as plague1',
            'problematica2.problematica as plague2',
            'orden.date1',
            'orden.date2',
            'orden.id_cliente',
            'clientes.name',
            'clientes.lastname1',
            'clientes.lastname2',
            'clientes.tradename',
            'clientes.home',
            'clientes.numAddress',
            'clientes.id_colonia',
            'clientes.id_city',
            'colonias.colonia',
            'colonias.codigoPostal',
            'ciudades.ciudad',
            'productosInternos1.productoInt as productoInt1',
            'productosInternos2.productoInt as productoInt2',
            'productosExternos1.productoExt as productoExt1',
            'productosExternos2.productoExt as productoExt2',
            'empleados1.nameEmpleado as nameEmpleado1',
            'empleados2.nameEmpleado as nameEmpleado2',
        ])
        ->join('orden', 'completarordenes.id_orden', '=', 'orden.id')
        ->join('productosInternos as productosInternos1', 'completarordenes.id_productosInternos', '=', 'productosInternos1.id')
        ->join('productosInternos as productosInternos2', 'completarordenes.id_productosInternos2', '=', 'productosInternos2.id')
        ->join('productosExternos as productosExternos1', 'completarordenes.id_productosExternos', '=', 'productosExternos1.id')
        ->join('productosExternos as productosExternos2', 'completarordenes.id_productosExternos2', '=', 'productosExternos2.id')
        ->join('empleados as empleados1', 'completarordenes.id_empleado', '=', 'empleados1.id')
        ->join('empleados as empleados2', 'completarordenes.id_empleado2', '=', 'empleados2.id')
        ->join('clientes', 'orden.id_cliente', '=', 'clientes.id')
        ->join('colonias', 'clientes.id_colonia', '=', 'colonias.id')
        ->join('problematicas as problematica1', 'orden.id_plague1', '=', 'problematica1.id')
        ->join('problematicas as problematica2', 'orden.id_plague2', '=', 'problematica2.id')    
        ->join('ciudades', 'clientes.id_city', '=', 'ciudades.id')
        ->where('clientes.tradename','!=','Particular')
        ->orderBy('completarordenes.id', 'DESC')
        ->get();
    
        //Funcion para las fechas
        foreach ($data as &$item) {
            $item->date1 = Carbon::parse($item->date1)->format('d-m-Y');
            $item->date2 = Carbon::parse($item->date2)->format('d-m-Y'); // Ajusta el formato según tus necesidades
        }

        // Verificar si la colección está vacía
        if ($data->isEmpty()) {
            return abort(404, 'No se encontraron datos.');
        }
    
        // Sumar todos los pagos
        $totalPago = $data->sum('pago');
    
        // Generación del PDF
        /* Imagen Del Logo */
        $path = public_path('img/membretadoFumi.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data_img = file_get_contents($path);
        $base64 = 'data:image/'.$type.';base64,'.base64_encode($data_img);
    
        // Preparar los datos para la vista del PDF
        $pdf_data = compact('base64', 'data', 'totalPago'); // Incluimos $totalPago
        $pdf = Pdf::loadView('reports.repoVentaConFact', $pdf_data)->save('myfile.pdf');
    
        // Mostrar el PDF al usuario
        return $pdf->stream();
    }

    public function generarVentasTotales() {
        // Realizar la consulta sin filtrar por 'id_cliente'
        $data = CompletarOrden::select([
            'completarordenes.*',
            'problematica1.problematica as plague1',
            'problematica2.problematica as plague2',
            'orden.date1',
            'orden.date2',
            'orden.id_cliente',
            'clientes.name',
            'clientes.lastname1',
            'clientes.lastname2',
            'clientes.tradename',
            'clientes.home',
            'clientes.numAddress',
            'clientes.id_colonia',
            'clientes.id_city',
            'colonias.colonia',
            'colonias.codigoPostal',
            'ciudades.ciudad',
            'productosInternos1.productoInt as productoInt1',
            'productosInternos2.productoInt as productoInt2',
            'productosExternos1.productoExt as productoExt1',
            'productosExternos2.productoExt as productoExt2',
            'empleados1.nameEmpleado as nameEmpleado1',
            'empleados2.nameEmpleado as nameEmpleado2',
        ])
        ->join('orden', 'completarordenes.id_orden', '=', 'orden.id')
        ->join('productosInternos as productosInternos1', 'completarordenes.id_productosInternos', '=', 'productosInternos1.id')
        ->join('productosInternos as productosInternos2', 'completarordenes.id_productosInternos2', '=', 'productosInternos2.id')
        ->join('productosExternos as productosExternos1', 'completarordenes.id_productosExternos', '=', 'productosExternos1.id')
        ->join('productosExternos as productosExternos2', 'completarordenes.id_productosExternos2', '=', 'productosExternos2.id')
        ->join('empleados as empleados1', 'completarordenes.id_empleado', '=', 'empleados1.id')
        ->join('empleados as empleados2', 'completarordenes.id_empleado2', '=', 'empleados2.id')
        ->join('clientes', 'orden.id_cliente', '=', 'clientes.id')
        ->join('colonias', 'clientes.id_colonia', '=', 'colonias.id')
        ->join('problematicas as problematica1', 'orden.id_plague1', '=', 'problematica1.id')
        ->join('problematicas as problematica2', 'orden.id_plague2', '=', 'problematica2.id')    
        ->join('ciudades', 'clientes.id_city', '=', 'ciudades.id')
        ->orderBy('completarordenes.id', 'DESC')
        ->get();
    
        //Funcion para las fechas
        foreach ($data as &$item) {
            $item->date1 = Carbon::parse($item->date1)->format('d-m-Y');
            $item->date2 = Carbon::parse($item->date2)->format('d-m-Y'); // Ajusta el formato según tus necesidades
        }

        // Verificar si la colección está vacía
        if ($data->isEmpty()) {
            return abort(404, 'No se encontraron datos.');
        }
    
        // Sumar todos los pagos
        $totalPago = $data->sum('pago');
    
        // Generación del PDF
        /* Imagen Del Logo */
        $path = public_path('img/membretadoFumi.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data_img = file_get_contents($path);
        $base64 = 'data:image/'.$type.';base64,'.base64_encode($data_img);
    
        // Preparar los datos para la vista del PDF
        $pdf_data = compact('base64', 'data', 'totalPago'); // Incluimos $totalPago
        $pdf = Pdf::loadView('reports.repoVentasTotales', $pdf_data)->save('myfile.pdf');
    
        // Mostrar el PDF al usuario
        return $pdf->stream();
    }

    public function generarCreditos() {
        // Realizar la consulta sin filtrar por 'id_cliente'
        $data = CompletarOrden::select([
            'completarordenes.*',
            'problematica1.problematica as plague1',
            'problematica2.problematica as plague2',
            'orden.date1',
            'orden.date2',
            'orden.id_cliente',
            'clientes.name',
            'clientes.lastname1',
            'clientes.lastname2',
            'clientes.tradename',
            'clientes.home',
            'clientes.numAddress',
            'clientes.id_colonia',
            'clientes.id_city',
            'colonias.colonia',
            'colonias.codigoPostal',
            'ciudades.ciudad',
            'productosInternos1.productoInt as productoInt1',
            'productosInternos2.productoInt as productoInt2',
            'productosExternos1.productoExt as productoExt1',
            'productosExternos2.productoExt as productoExt2',
            'empleados1.nameEmpleado as nameEmpleado1',
            'empleados2.nameEmpleado as nameEmpleado2',
        ])
        ->join('orden', 'completarordenes.id_orden', '=', 'orden.id')
        ->join('productosInternos as productosInternos1', 'completarordenes.id_productosInternos', '=', 'productosInternos1.id')
        ->join('productosInternos as productosInternos2', 'completarordenes.id_productosInternos2', '=', 'productosInternos2.id')
        ->join('productosExternos as productosExternos1', 'completarordenes.id_productosExternos', '=', 'productosExternos1.id')
        ->join('productosExternos as productosExternos2', 'completarordenes.id_productosExternos2', '=', 'productosExternos2.id')
        ->join('empleados as empleados1', 'completarordenes.id_empleado', '=', 'empleados1.id')
        ->join('empleados as empleados2', 'completarordenes.id_empleado2', '=', 'empleados2.id')
        ->join('clientes', 'orden.id_cliente', '=', 'clientes.id')
        ->join('colonias', 'clientes.id_colonia', '=', 'colonias.id')
        ->join('problematicas as problematica1', 'orden.id_plague1', '=', 'problematica1.id')
        ->join('problematicas as problematica2', 'orden.id_plague2', '=', 'problematica2.id')    
        ->join('ciudades', 'clientes.id_city', '=', 'ciudades.id')
        ->where('completarordenes.requiere3','=','Credito')
        ->orderBy('completarordenes.id', 'DESC')
        ->get();
    
        // Verificar si la colección está vacía
        if ($data->isEmpty()) {
            return abort(404, 'No se encontraron datos.');
        }
    
        //Funcion para las fechas
        foreach ($data as &$item) {
            $item->date1 = Carbon::parse($item->date1)->format('d-m-Y');
            $item->date2 = Carbon::parse($item->date2)->format('d-m-Y'); // Ajusta el formato según tus necesidades
        }

        // Sumar todos los pagos
        $totalPago = $data->sum('pago');
    
        // Generación del PDF
        /* Imagen Del Logo */
        $path = public_path('img/membretadoFumi.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data_img = file_get_contents($path);
        $base64 = 'data:image/'.$type.';base64,'.base64_encode($data_img);
    
        // Preparar los datos para la vista del PDF
        $pdf_data = compact('base64', 'data', 'totalPago'); // Incluimos $totalPago
        $pdf = Pdf::loadView('reports.repoCreditos', $pdf_data)->save('myfile.pdf');
    
        // Mostrar el PDF al usuario
        return $pdf->stream();
    }

    public function generarCreditosSinFactura() {
        // Realizar la consulta sin filtrar por 'id_cliente'
        $data = CompletarOrden::select([
            'completarordenes.*',
            'problematica1.problematica as plague1',
            'problematica2.problematica as plague2',
            'orden.date1',
            'orden.date2',
            'orden.id_cliente',
            'clientes.name',
            'clientes.lastname1',
            'clientes.lastname2',
            'clientes.tradename',
            'clientes.home',
            'clientes.numAddress',
            'clientes.id_colonia',
            'clientes.id_city',
            'colonias.colonia',
            'colonias.codigoPostal',
            'ciudades.ciudad',
            'productosInternos1.productoInt as productoInt1',
            'productosInternos2.productoInt as productoInt2',
            'productosExternos1.productoExt as productoExt1',
            'productosExternos2.productoExt as productoExt2',
            'empleados1.nameEmpleado as nameEmpleado1',
            'empleados2.nameEmpleado as nameEmpleado2',
        ])
        ->join('orden', 'completarordenes.id_orden', '=', 'orden.id')
        ->join('productosInternos as productosInternos1', 'completarordenes.id_productosInternos', '=', 'productosInternos1.id')
        ->join('productosInternos as productosInternos2', 'completarordenes.id_productosInternos2', '=', 'productosInternos2.id')
        ->join('productosExternos as productosExternos1', 'completarordenes.id_productosExternos', '=', 'productosExternos1.id')
        ->join('productosExternos as productosExternos2', 'completarordenes.id_productosExternos2', '=', 'productosExternos2.id')
        ->join('empleados as empleados1', 'completarordenes.id_empleado', '=', 'empleados1.id')
        ->join('empleados as empleados2', 'completarordenes.id_empleado2', '=', 'empleados2.id')
        ->join('clientes', 'orden.id_cliente', '=', 'clientes.id')
        ->join('colonias', 'clientes.id_colonia', '=', 'colonias.id')
        ->join('problematicas as problematica1', 'orden.id_plague1', '=', 'problematica1.id')
        ->join('problematicas as problematica2', 'orden.id_plague2', '=', 'problematica2.id')    
        ->join('ciudades', 'clientes.id_city', '=', 'ciudades.id')
        // Filtrar por órdenes no pagadas y clientes particulares
        ->where('completarordenes.requiere3', 'Credito')
        ->where('clientes.tradename', 'Particular')
        // Ordenar por ID de forma descendente
        ->orderBy('completarordenes.id', 'DESC')
        ->get();
    
        // Verificar si la colección está vacía
        if ($data->isEmpty()) {
            return abort(404, 'No se encontraron datos.');
        }
    
        //Funcion para las fechas
        foreach ($data as &$item) {
            $item->date1 = Carbon::parse($item->date1)->format('d-m-Y');
            $item->date2 = Carbon::parse($item->date2)->format('d-m-Y'); // Ajusta el formato según tus necesidades
        }

        // Sumar todos los pagos
        $totalPago = $data->sum('pago');
    
        // Generación del PDF
        /* Imagen Del Logo */
        $path = public_path('img/membretadoFumi.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data_img = file_get_contents($path);
        $base64 = 'data:image/'.$type.';base64,'.base64_encode($data_img);
    
        // Preparar los datos para la vista del PDF
        $pdf_data = compact('base64', 'data', 'totalPago'); // Incluimos $totalPago
        $pdf = Pdf::loadView('reports.repoCreditosSinFactura', $pdf_data)->save('myfile.pdf');
    
        // Mostrar el PDF al usuario
        return $pdf->stream();
    }

    public function generarCreditosConFactura() {
        // Realizar la consulta sin filtrar por 'id_cliente'
        $data = CompletarOrden::select([
            'completarordenes.*',
            'problematica1.problematica as plague1',
            'problematica2.problematica as plague2',
            'orden.date1',
            'orden.date2',
            'orden.id_cliente',
            'clientes.name',
            'clientes.lastname1',
            'clientes.lastname2',
            'clientes.tradename',
            'clientes.home',
            'clientes.numAddress',
            'clientes.id_colonia',
            'clientes.id_city',
            'colonias.colonia',
            'colonias.codigoPostal',
            'ciudades.ciudad',
            'productosInternos1.productoInt as productoInt1',
            'productosInternos2.productoInt as productoInt2',
            'productosExternos1.productoExt as productoExt1',
            'productosExternos2.productoExt as productoExt2',
            'empleados1.nameEmpleado as nameEmpleado1',
            'empleados2.nameEmpleado as nameEmpleado2',
        ])
        ->join('orden', 'completarordenes.id_orden', '=', 'orden.id')
        ->join('productosInternos as productosInternos1', 'completarordenes.id_productosInternos', '=', 'productosInternos1.id')
        ->join('productosInternos as productosInternos2', 'completarordenes.id_productosInternos2', '=', 'productosInternos2.id')
        ->join('productosExternos as productosExternos1', 'completarordenes.id_productosExternos', '=', 'productosExternos1.id')
        ->join('productosExternos as productosExternos2', 'completarordenes.id_productosExternos2', '=', 'productosExternos2.id')
        ->join('empleados as empleados1', 'completarordenes.id_empleado', '=', 'empleados1.id')
        ->join('empleados as empleados2', 'completarordenes.id_empleado2', '=', 'empleados2.id')
        ->join('clientes', 'orden.id_cliente', '=', 'clientes.id')
        ->join('colonias', 'clientes.id_colonia', '=', 'colonias.id')
        ->join('problematicas as problematica1', 'orden.id_plague1', '=', 'problematica1.id')
        ->join('problematicas as problematica2', 'orden.id_plague2', '=', 'problematica2.id')    
        ->join('ciudades', 'clientes.id_city', '=', 'ciudades.id')
        ->where('completarordenes.requiere3','Credito')
        ->where('clientes.tradename','!=','Particular')
        ->orderBy('completarordenes.id', 'DESC')
        ->get();
    
        // Verificar si la colección está vacía
        if ($data->isEmpty()) {
            return abort(404, 'No se encontraron datos.');
        }
    
        //Funcion para las fechas
        foreach ($data as &$item) {
            $item->date1 = Carbon::parse($item->date1)->format('d-m-Y');
            $item->date2 = Carbon::parse($item->date2)->format('d-m-Y'); // Ajusta el formato según tus necesidades
        }

        // Sumar todos los pagos
        $totalPago = $data->sum('pago');
    
        // Generación del PDF
        /* Imagen Del Logo */
        $path = public_path('img/membretadoFumi.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data_img = file_get_contents($path);
        $base64 = 'data:image/'.$type.';base64,'.base64_encode($data_img);
    
        // Preparar los datos para la vista del PDF
        $pdf_data = compact('base64', 'data', 'totalPago'); // Incluimos $totalPago
        $pdf = Pdf::loadView('reports.repoCreditosConFactura', $pdf_data)->save('myfile.pdf');
    
        // Mostrar el PDF al usuario
        return $pdf->stream();
    }

    public function generarPDFCaja(){
        $data = Ingresos ::all();

        $dataCO = CompletarOrden::select([
            'completarordenes.*',
            'orden.date1',
            'clientes.name',
        ])
        ->join('orden', 'completarordenes.id_orden', '=', 'orden.id')
        ->join('clientes', 'orden.id_cliente', '=', 'clientes.id')
        ->get();

        // Obtener la suma total de 'pago' de CompletarOrden
        $totalPagos = CompletarOrden::where('requiere3', 'Pagado')->sum('pago');

        // Obtener la suma total de 'montoIngreso' de Ingresos
        $totalIngresosAdicionales = Ingresos::sum('montoIngreso');

        $totalCaja = $totalPagos + $totalIngresosAdicionales;

        $dataEg = Egresos ::all();

        $totalEgresos = Egresos::sum('montoEgresos');

    $totalSaldo = $totalCaja - $totalEgresos;
    
        
        /* Imagen Del Logo */
        $path = public_path('img/membretadoFumi.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data_img = file_get_contents($path);
        $base64 = 'data:image/'.$type.';base64,'.base64_encode($data_img);
        //dd($base64);
        //$pdf_data = compact('data','clientes','base64');
        $pdf_data = compact('base64','data','dataCO','totalCaja','dataEg','totalEgresos','totalSaldo');
        $pdf = Pdf::loadView('reports.repoCaja',$pdf_data);
        return $pdf->stream();
        return $pdf->download('invoice.pdf');
    }
}
