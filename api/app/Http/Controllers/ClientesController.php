<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Validator;

class ClientesController extends Controller
{
    public function index()
    {
        $data = Cliente::all();
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
            'name' => 'required|min:3',
            'lastname1' => 'required|min:3',
            'lastname2' => 'required|min:3',
            'street' => 'required|min:3',
            'home' => 'required|min:3',
            'cp' => 'required|min:5',
            'cologne' => 'required|min:3',
            'city' => 'required|min:3',
            'type_of_place' => 'required|min:3',
            'cell_phone' => 'required|min:10',
            'contact_form' => 'required|min:3',
            'specify' => 'required|min:3',
        ]);
        if( $reglas -> fails()){
            return response()->json([
                'status'=>'failed',
                'message'=> 'Validation Error',
                'error' => $reglas->errors()
            ],201);
        }else{
            $data = new Cliente();
            $data->name = $request->name;
            $data->lastname1 = $request->lastname1;
            $data->lastname2 = $request->lastname2;
            $data->tradename = 'Ninguno...';
            $data->street = $request->street;            
            $data->home = $request->home;
            $data->cp = $request->cp;            
            $data->cologne = $request->cologne;
            $data->city = $request->city;            
            $data->type_of_place = $request->type_of_place;
            $data->description = 'Ninguno...';
            $data->how_to_get = 'Ninguno...';
            $data->cell_phone = $request->cell_phone;
            $data->number_fixed_number = 'Ninguno...';            
            $data->contact_form = $request->contact_form;
            $data->specify = $request->specify;
            $data->save();

            return response()->json([
                'status'=>'success'
            ]);
            
        }
    }

    public function sendEmail($token,$name)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

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

    public function upload(Request $request){
        /*
        if ($request->hasFile('file')){
            $file  = $request->file('file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('products/'),$filename);

            return response()->json(['filename' =>  $filename]);
        }
        return response()->json(['error' => 'No se propocionó ningun archivo'],
        400);
        */
    }
}
