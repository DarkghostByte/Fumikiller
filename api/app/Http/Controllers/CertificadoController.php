<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificado;
use Validator;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
class CertificadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
            'productosInternos.productoInt',
            'productosExternos.productoExt'
        ])
        ->join('productosInternos', 'certificados.id_productoCertificadoInt1', '=', 'productosInternos.id')
        ->join('productosExternos', 'certificados.id_productoCertificadoExt1', '=', 'productosExternos.id')
        ->join('clientes', 'certificados.id_cliente', '=', 'clientes.id')
        ->join('colonias', 'clientes.id_colonia', '=', 'colonias.id')
        ->join('ciudades', 'clientes.id_city', '=', 'ciudades.id')
        ->join('comercios', 'clientes.id_comercio', '=', 'comercios.id')
        ->orderBy('certificados.id', 'DESC')
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
            'id_cliente' => 'min:1',
            'certificateName' => 'required|min:1',
            'certificateDate' => 'required|min:1',
            'id_productoCertificadoInt1' => 'required|min:1',
            'id_productoCertificadoExt1' => 'required|min:1',
        ]);
        if( $reglas -> fails()){
            return response()->json([
                'status'=>'failed',
                'message'=> 'Validation Error',
                'error' => $reglas->errors()
            ],201);
        }else{
            $data = new Certificado();
            $data->id_cliente = $request->id_cliente;
            $data->certificateName = $request->certificateName;
            $data->certificateDate = $request->certificateDate;
            $data->id_productoCertificadoInt1 = $request->id_productoCertificadoInt1;
            $data->id_productoCertificadoExt1 = $request->id_productoCertificadoExt1;            
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
        //
    }
}
