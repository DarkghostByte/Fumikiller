<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ciudad;
use Validator;

class CiudadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Ciudad ::all();
        return response()->json([
            'status'=>'success',
            'data'=>$data
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
            'ciudad' => 'required|min:1',
            'estado' => 'required|min:1',
            'infodelete_Ciudad' => 'required|min:1',
        ]);
        if( $reglas -> fails()){
            return response()->json([
                'status'=>'failed',
                'message'=> 'Validation Error',
                'error' => $reglas->errors()
            ],201);
        }else{
            $data = new Ciudad();
            $data->ciudad = $request->ciudad;
            $data->estado = $request->estado;
            $data->infodelete_Ciudad = $request->infodelete_Ciudad;
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
        $data = Ciudad::find($id);
        $reglas = Validator::make($request->all(), [
            'ciudad' => 'required|min:1',
            'estado' => 'required|min:1',
        ]);
        if (!$data) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Ciudad no encontrado'
            ], 404);
        }
        if ($reglas->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Error de validación',
                'errors' => $reglas->errors()
            ], 400);
        }
        $data->fill($request->all());
        $data->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Ciudad actualizado correctamente',
            'data' => $data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Ciudad::find($id);
        if($data != null){
            $data -> delete();
        } return response()->json([
            'status'=>'success'
        ]);
    }

    public function verCiudades()
    {
        $ciudades = Ciudad::where('infodelete_Ciudad', '!=', 'Baja')->get();
        return response()->json($ciudades);
    }

    public function desactivarCiudad(Request $request, $id)
    {
    $data = Ciudad::find($id);

    if (!$data) {
        return response()->json([
        'status' => 'error',
        'message' => 'Ciudad no encontrado'
        ], 404);
    }

    $validator = Validator::make($request->all(), [
        'infodelete_Ciudad' => 'required|in:Alta,Baja',
    ]);

    if ($validator->fails()) {
        return response()->json([
        'status' => 'failed',
        'message' => 'Error de validación',
        'errors' => $validator->errors()
        ], 400);
    }

    $updatedData = [
        'infodelete_Ciudad' => $request->infodelete_Ciudad
    ];

    $data->update($updatedData);

    return response()->json([
        'status' => 'success',
        'message' => 'Activacion de ciudad cambiada exitosamente',
        'data' => $data
    ]);
    }
}
