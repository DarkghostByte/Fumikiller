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
                'colonias.colonia',
                'colonias.codigoPostal',
                'ciudades.ciudad'
            ])
            ->join('clientes', 'orden.id_cliente', '=', 'clientes.id')
            ->join('colonias', 'clientes.id_colonia', '=', 'colonias.id')
            ->join('ciudades', 'clientes.id_city', '=', 'ciudades.id')
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
        $data = Orden::find($id);
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
}
