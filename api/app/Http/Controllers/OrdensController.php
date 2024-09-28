<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orden;
use Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class OrdensController extends Controller
{
    public function index()
    {
        $data = Orden::select([
                'orden.*',
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
                'ciudades.ciudad'
            ])
            ->join('clientes', 'orden.id_cliente', '=', 'clientes.id')
            ->join('colonias', 'clientes.id_colonia', '=', 'colonias.id')
            ->join('ciudades', 'clientes.id_city', '=', 'ciudades.id')
            ->join('comercios', 'clientes.id_comercio', '=', 'comercios.id')
            ->orderBy('orden.id', 'DESC')
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }
        /*
    $data = Orden::select(['orden.*','clientes.name','clientes.lastname1','clientes.lastname2'
    ])->join('clientes','orden.id_cliente','=','clientes.id')
    ->orderBy('orden.id','DESC')
    ->get();

    $all = [];
    foreach ($data as $item) {
        $products = ProductoPedido::select(['productos_pedidos.*','products.name','products.img','products.description'])
        ->join('products','productos_pedidos.id_product','=' ,'products.id')
        ->where('id_product',$item->id)
        ->get();

        $all [] = [
            'pedido'=>$item, 
            'productos'=>$products
        ];
        
    }

        return response()->json([
            'success'=>true,
            'data'=>$all
        ]);

        */

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
            'id_cliente' => 'min:1',
            'plague1' => 'required|min:1',
            'plague2' => '',
            'date1' => 'required|min:1',
            'date2' => 'required|min:1',
            'time1' => 'required|min:1',
            'time2' => 'required|min:1',
            'hiring' => 'array|required|min:1',
            'requires' => 'array|required|min:1',
            'infoorden_delete' => 'required|min:1',
            'statusOrder' => 'required|min:1',
        ]);
        if( $reglas -> fails()){
            return response()->json([
                'status'=>'failed',
                'message'=> 'Validation Error',
                'error' => $reglas->errors()
            ],201);
        }else{
            $data = new Orden();
            $data->id_cliente = $request->id_cliente;
            $data->plague1 = $request->plague1;
            $data->plague2 = $request->plague2;
            $data->date1 = $request->date1;
            $data->date2 = $request->date2;            
            $data->time1 = $request->time1;
            $data->time2 = $request->time2;
            $data->hiring = json_encode($request->hiring);
            $data->requires = json_encode($request->requires);
            $data->infoorden_delete = $request->infoorden_delete;
            $data->statusOrder = $request->statusOrder;
            $data->save();

            return response()->json([
                'status'=>'success'
            ]);
            
        }
    }
    //PDF VentasSinFactura
    public function generarVentSinFact(){

        /* Imagen Del Logo */
        $path = public_path('img/membretadoFumi.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data_img = file_get_contents($path);
        $base64 = 'data:image/'.$type.';base64,'.base64_encode($data_img);
        //dd($base64);
        //$pdf_data = compact('data','clientes','base64');
        $pdf_data = compact('base64');
        $pdf = Pdf::loadView('reports.repoVentaSinFact',$pdf_data);
        //$pdf = Pdf::loadView('reports.repoCer',$pdf_data)->setPaper('a4', 'landscape');
        return $pdf->stream();
        return $pdf->download('invoice.pdf');
    }
    //PDF VentasConFactura
    public function generarVentConFact(){

        /* Imagen Del Logo */
        $path = public_path('img/membretadoFumi.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data_img = file_get_contents($path);
        $base64 = 'data:image/'.$type.';base64,'.base64_encode($data_img);
        //dd($base64);
        //$pdf_data = compact('data','clientes','base64');
        $pdf_data = compact('base64');
        $pdf = Pdf::loadView('reports.repoVentaConFact',$pdf_data);
        //$pdf = Pdf::loadView('reports.repoCer',$pdf_data)->setPaper('a4', 'landscape');
        return $pdf->stream();
        return $pdf->download('invoice.pdf');
    }
    //PDF Creditos
    public function generarCreditos(){

        /* Imagen Del Logo */
        $path = public_path('img/membretadoFumi.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data_img = file_get_contents($path);
        $base64 = 'data:image/'.$type.';base64,'.base64_encode($data_img);
        //dd($base64);
        //$pdf_data = compact('data','clientes','base64');
        $pdf_data = compact('base64');
        $pdf = Pdf::loadView('reports.repoCreditos',$pdf_data);
        //$pdf = Pdf::loadView('reports.repoCer',$pdf_data)->setPaper('a4', 'landscape');
        return $pdf->stream();
        return $pdf->download('invoice.pdf');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $orden = Orden::with('cliente')->find($id);

    if (!$orden) {
        return response()->json(['message' => 'Orden no encontrada'], 404);
    }

    return response()->json(['data' => $orden], 200);
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
        $data = Orden::find($id);
        if($data != null){
            $data -> delete();
        } return response()->json([
            'status'=>'success'
        ]);
    }

    public function generarOrdenPDF($id){        
        // Obtener datos del cliente junto con ciudad y colonia
        $orden = Orden::select([
            'orden.*',
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
            'colonias.colonia',
            'colonias.codigoPostal',
            'ciudades.ciudad',
            'comercios.comercio',
        ])
        ->join('clientes', 'orden.id_cliente', '=', 'clientes.id')
        ->join('colonias', 'clientes.id_colonia', '=', 'colonias.id')
        ->join('ciudades', 'clientes.id_city', '=', 'ciudades.id')
        ->join('comercios', 'clientes.id_comercio', '=', 'comercios.id')
        ->where('orden.id', $id)
        ->first();
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
        //dd($base64);
        //$pdf_data = compact('data','clientes','base64');
        $pdf_data = compact('base64','orden');
        $pdf = Pdf::loadView('reports.reporteOrdenPdf',$pdf_data)->save('myfile.pdf');
        //$pdf = Pdf::loadView('reports.reporte',$pdf_data)->save('myfile.pdf');
        //$pdf = Pdf::loadView('reports.repoCer',$pdf_data)->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function desactivarOrden(Request $request, $id)
    {
    $orden = Orden::find($id);

    if (!$orden) {
        return response()->json([
        'status' => 'error',
        'message' => 'Orden no encontrado'
        ], 404);
    }

    $validator = Validator::make($request->all(), [
        'infoorden_delete' => 'required|in:Alta,Baja',
    ]);

    if ($validator->fails()) {
        return response()->json([
        'status' => 'failed',
        'message' => 'Error de validación',
        'errors' => $validator->errors()
        ], 400);
    }

    $updatedData = [
        'infoorden_delete' => $request->infoorden_delete
    ];

    $orden->update($updatedData);

    return response()->json([
        'status' => 'success',
        'message' => 'Cliente desactivado exitosamente',
        'data' => $orden
    ]);
    }

    public function totalOrdenes()
    {
        $totalOrdenes = Orden::count();
        return response()->json(['total' => $totalOrdenes]);
    }

    public function verEstadoOrden(Request $request, $id)
    {
    $orden = Orden::find($id);

    if (!$orden) {
        return response()->json([
        'status' => 'error',
        'message' => 'Orden no encontrado'
        ], 404);
    }

    $validator = Validator::make($request->all(), [
        'statusOrder' => 'required|in:Terminada,Por realizar',
    ]);

    if ($validator->fails()) {
        return response()->json([
        'status' => 'failed',
        'message' => 'Error de validación',
        'errors' => $validator->errors()
        ], 400);
    }

    $updatedData = [
        'statusOrder' => $request->statusOrder
    ];

    $orden->update($updatedData);

    return response()->json([
        'status' => 'success',
        'message' => 'Estado cambiado exitosamente',
        'data' => $orden
    ]);
    }
}
