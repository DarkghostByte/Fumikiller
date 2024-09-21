<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompletarOrden;
use App\Models\Orden;
use Carbon\Carbon;
use Validator;
use Barryvdh\DomPDF\Facade\Pdf;


class CompletarOrdenesController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * 
     */
    public function index(Request $request)
{
    $id_cliente = $request->query('id_cliente');

    $query = CompletarOrden::select([
        'completarordenes.*',
        'orden.plague1',
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
        'ciudades.ciudad'
    ])
    ->join('orden', 'completarordenes.id_orden', '=', 'orden.id')
    ->join('clientes', 'orden.id_cliente', '=', 'clientes.id')
    ->join('colonias', 'clientes.id_colonia', '=', 'colonias.id')
    ->join('ciudades', 'clientes.id_city', '=', 'ciudades.id');

    if ($id_cliente) {
        $query->where('orden.id_cliente', $id_cliente);
    }

    $data = $query->orderBy('completarordenes.id', 'DESC')->get();

    return response()->json([
        'status' => 'success',
        'data' => $data
    ]);
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
        $reglas = Validator::make($request->all(),[
            'id_orden' => 'required|min:1',
            'responsable' => 'required|min:1',
            'ayudante' => '',
            'productoInt1' => 'required|min:1',
            'productoInt2' => '',
            'productoExt1' => 'required|min:1',
            'productoExt2' => '',
            'noTrapear' => 'required|min:1',
            'noIngresar' => 'required|min:1',
            'otraDosis' => 'required|min:1',
            'hora' => 'required|min:1',
            'pago' => 'required|numeric',
            'requiere1' => 'array|min:1',
            'requiere2' => 'array|min:1',
            'requiere3' => 'required|min:1',
        ]);
        if( $reglas -> fails()){
            return response()->json([
                'status'=>'failed',
                'message'=> 'Validation Error',
                'error' => $reglas->errors()
            ],422);
        }else{
            $data = new CompletarOrden();
            $data->id_orden = $request->id_orden;
            $data->responsable = $request->responsable;
            $data->ayudante = $request->ayudante;
            $data->productoInt1 = $request->productoInt1;
            $data->productoInt2 = $request->productoInt2;
            $data->productoExt1 = $request->productoExt1;
            $data->productoExt2 = $request->productoExt2;
            $data->noTrapear = $request->noTrapear;
            $data->noIngresar = $request->noIngresar;
            $data->otraDosis = $request->otraDosis;
            $data->hora = $request->hora;
            $data->pago = $request->pago;
            $data->requiere1 = json_encode($request->requiere1);
            $data->requiere2 = json_encode($request->requiere2);
            $data->requiere3 = $request->requiere3;
            $data->save();

            return response()->json([
                'status'=>'success'
            ]);
            
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $data = CompletarOrden::select(['completarordenes.*', 
    'orden.plague1',
    'clientes.name',
    'clientes.lastname1',
    'clientes.lastname2',
    'clientes.tradename'])
    ->join('orden', 'completarordenes.id_orden', '=', 'orden.id')
    ->join('clientes', 'orden.id_cliente', '=', 'clientes.id')
    ->where('completarordenes.id', $id)
    ->first();

    return response()->json([
        'status'=>'success',
        'data'=>$data
    ]);
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
        $completarOrden = CompletarOrden::find($id);
        $reglas = Validator::make($request->all(), [
            'responsable' => 'required|min:1',
            'ayudante' => '',
            'productoInt1' => 'required|min:1',
            'productoInt2' => '',
            'productoExt1' => 'required|min:1',
            'productoExt2' => '',
            'noTrapear' => 'required|min:1',
            'noIngresar' => 'required|min:1',
            'otraDosis' => 'required|min:1',
            'hora' => 'required|min:1',
            'pago' => 'required|numeric',
            'requiere1' => 'array|min:1',
            'requiere2' => 'array|min:1',
            'requiere3' => 'required|min:1',
        ]);
        if (!$completarOrden) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Cliente no encontrado'
            ], 404);
        }
        if ($reglas->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Error de validación',
                'errors' => $reglas->errors()
            ], 400);
        }
        $completarOrden->fill($request->all());
        $completarOrden->save();
        return response()->json([
            'status' => 'success',
            'message' => 'La orden se actualizo correctamente',
            'data' => $completarOrden
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = CompletarOrden::find($id);
        if($data != null){
            $data -> delete();
        } return response()->json([
            'status'=>'success'
        ]);
    }

    public function generarVentSinFact() {
        // Realizar la consulta sin filtrar por 'id_cliente'
        $data = CompletarOrden::select([
            'completarordenes.*',
            'orden.plague1',
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
            'ciudades.ciudad'
        ])
        ->join('orden', 'completarordenes.id_orden', '=', 'orden.id')
        ->join('clientes', 'orden.id_cliente', '=', 'clientes.id')
        ->join('colonias', 'clientes.id_colonia', '=', 'colonias.id')
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
    

    public function generarCreditos() {
        /*
        public function generarCreditos()
        {
            $data = Completarordene::where('requiere3', 'No Pagado')
                ->with('orden', 'cliente')
                ->get();

            // Calculate total credit
            $totalCredito = $data->sum('pago');

            return view('reports.repoCreditos', compact('data', 'totalCredito'));
        }

        */
        // Realizar la consulta sin filtrar por 'id_cliente'
        $data = CompletarOrden::select([
            'completarordenes.*',
            'orden.plague1',
            'orden.date1',
            'orden.date2',
            'orden.date2',
            'orden.requires',
            'orden.id_cliente',
            'clientes.name',
            'clientes.lastname1',
            'clientes.lastname2',
            'clientes.tradename',
            'clientes.home',
            'clientes.numAddress',
            'clientes.id_colonia',
            'clientes.id_city',
            'clientes.cell_phone',
            'colonias.colonia',
            'colonias.codigoPostal',
            'ciudades.ciudad'
        ])
        ->join('orden', 'completarordenes.id_orden', '=', 'orden.id')
        ->join('clientes', 'orden.id_cliente', '=', 'clientes.id')
        ->join('colonias', 'clientes.id_colonia', '=', 'colonias.id')
        ->join('ciudades', 'clientes.id_city', '=', 'ciudades.id')
        ->where('completarordenes.requiere3','=','No Pagado')
        ->orderBy('completarordenes.id', 'DESC')
        ->get();
    
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
        $pdf = Pdf::loadView('reports.repoCreditos', $pdf_data)->save('myfile.pdf');
    
        // Mostrar el PDF al usuario
        return $pdf->stream();
    }

    public function generarVentConFact() {
        // Realizar la consulta sin filtrar por 'id_cliente'
        $data = CompletarOrden::select([
            'completarordenes.*',
            'orden.plague1',
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
            'ciudades.ciudad'
        ])
        ->join('orden', 'completarordenes.id_orden', '=', 'orden.id')
        ->join('clientes', 'orden.id_cliente', '=', 'clientes.id')
        ->join('colonias', 'clientes.id_colonia', '=', 'colonias.id')
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
            'orden.plague1',
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
            'ciudades.ciudad'
        ])
        ->join('orden', 'completarordenes.id_orden', '=', 'orden.id')
        ->join('clientes', 'orden.id_cliente', '=', 'clientes.id')
        ->join('colonias', 'clientes.id_colonia', '=', 'colonias.id')
        ->join('ciudades', 'clientes.id_city', '=', 'ciudades.id')
        ->orderBy('completarordenes.id', 'DESC')
        ->get();
    
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

    public function generarOrden($id){        
        // Obtener datos del cliente junto con ciudad y colonia
        $ordenCompleta = CompletarOrden::select('completarordenes.*',
            'orden.plague1',
            'orden.plague2',
            'orden.date1',
            'orden.date2',
            'orden.time1',
            'orden.time2',
            'orden.id_cliente',
            'clientes.name',
            'clientes.lastname1',
            'clientes.lastname2',
            'clientes.tradename',
            'clientes.home',
            'clientes.numAddress',
            'clientes.id_colonia',
            'clientes.id_city',
            'clientes.cell_phone',
            'clientes.how_to_get',
            'clientes.description',
            'clientes.contact_form',
            'comercios.comercio',
            'colonias.colonia',
            'colonias.codigoPostal',
            'ciudades.ciudad')
            ->join('orden', 'completarordenes.id_orden', '=', 'orden.id')
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
        //dd($base64);
        //$pdf_data = compact('data','clientes','base64');
        $pdf_data = compact('base64','ordenCompleta');
        $pdf = Pdf::loadView('reports.reporteOrdenCompletaPDF',$pdf_data)->save('myfile.pdf');
        //$pdf = Pdf::loadView('reports.reporte',$pdf_data)->save('myfile.pdf');
        //$pdf = Pdf::loadView('reports.repoCer',$pdf_data)->setPaper('a4', 'landscape');
        return $pdf->stream();
    }


    public function totalPagos()
        {
            $totalPagos = CompletarOrden::sum('pago');
            return response()->json(['total' => $totalPagos]);
        }

    public function totalCreditos()
        {
            $totalCreditos = CompletarOrden::where('requiere3', 'No Pagado')
            ->sum('pago');
            return response()->json(['total' => $totalCreditos]);
        }

        public function totalVentasSinFactura()
        {
            $totalVentasSinFactura = CompletarOrden::
            select('completarordenes.*',
            'clientes.tradename')
            ->join('orden', 'completarordenes.id_orden', '=', 'orden.id')
            ->join('clientes', 'orden.id_cliente', '=', 'clientes.id')
            ->where('clientes.tradename','=','Particular')

            ->sum('pago');
            return response()->json(['total' => $totalVentasSinFactura]);
        }

        public function totalVentasConFactura()
        {
            $totalVentasConFactura = CompletarOrden::
            select('completarordenes.*',
            'clientes.tradename')
            ->join('orden', 'completarordenes.id_orden', '=', 'orden.id')
            ->join('clientes', 'orden.id_cliente', '=', 'clientes.id')
            ->where('clientes.tradename','!=','Particular')

            ->sum('pago');
            return response()->json(['total' => $totalVentasConFactura]);
        }

        public function generarCertificado($id){
            $ordenCompleta = CompletarOrden::select('completarordenes.*',
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
            'clientes.cell_phone',
            'comercios.comercio',
            'colonias.colonia',
            'colonias.codigoPostal',
            'ciudades.ciudad',
            'ciudades.estado')
            ->join('orden', 'completarordenes.id_orden', '=', 'orden.id')
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
            /* Imagen Del Logo */
            $path = public_path('img/membretadoFumi.png');
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data_img = file_get_contents($path);
            $base64 = 'data:image/'.$type.';base64,'.base64_encode($data_img);
            //dd($base64);
            //$pdf_data = compact('data','clientes','base64');
            $pdf_data = compact('base64','ordenCompleta');
            $pdf = Pdf::loadView('reports.repoCertificado',$pdf_data)->setPaper('a4', 'landscape');     
            //$pdf = Pdf::loadView('reports.repoCer',$pdf_data)->setPaper('a4', 'landscape');
            return $pdf->stream();
            return $pdf->download('invoice.pdf');
        }

        public function actualizarEstado(Request $request, $id)
        {
            $completarOrden = CompletarOrden::find($id);

            $validator = Validator::make($request->all(), [
                'requiere3' => 'required|in:Pagado,No Pagado', 
            ]);

            if (!$completarOrden) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Orden no encontrada'
                ], 404);
            }

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 400);
            }

            // Actualizar el estado y el pago
            $completarOrden->requiere3 = $request->requiere3;
            $completarOrden->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Estado  actualizados correctamente',
                'data' => $completarOrden
            ]);
        }

}
