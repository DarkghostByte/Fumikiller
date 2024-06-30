<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompletarOrden;
use Validator;

class CompletarOrdenesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CompletarOrden::select(['completarordenes.*', 'orden.plague1','clientes.name',
        'clientes.lastname1',
        'clientes.lastname2',
        'clientes.tradename',])
        ->join('orden', 'completarordenes.id_orden', '=', 'orden.id')
        ->join('clientes', 'orden.id_cliente', '=', 'clientes.id')
        ->orderBy('completarordenes.id', 'DESC')
        ->get();

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
            'ayudante' => 'min:1',
            'productoInt1' => 'required|min:1',
            'productoInt2' => 'min:1',
            'productoExt1' => 'required|min:1',
            'productoExt2' => 'min:1',
            'noTrapear' => 'min:1',
            'noIngresar' => 'min:1',
            'otraDosis' => 'min:1',
            'hora' => 'min:1',
            'pago' => 'numeric',
            'requiere1' => 'required|min:1',
            'requiere2' => 'required|min:1',
        ]);
        if( $reglas -> fails()){
            return response()->json([
                'status'=>'failed',
                'message'=> 'Validation Error',
                'error' => $reglas->errors()
            ],201);
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
            $data->requiere1 = $request->requiere1;
            $data->requiere2 = $request->requiere2;
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
        $data = CompletarOrden::find($id);
        if($data != null){
            $data -> delete();
        } return response()->json([
            'status'=>'success'
        ]);
    }
}
