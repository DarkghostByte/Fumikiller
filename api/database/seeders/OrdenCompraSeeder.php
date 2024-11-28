<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class OrdenCompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ordenCompra')->insert([
            'fechaOrdenCompra'=>'27/11/2024',
            'paraOrdenCompra'=>'Gasolinera Paquime',
            'conceptoOrdenCompra'=>'Llenar tanque',
            'detalleOrdenCompra'=>'Por favor llenar el tanque',
            'empleadoOrdenCompra'=>'Jesus Liadeo Chavez Chavez',
            'importeOrdenCompra'=>'1500',
            'autorizoOrdenCompra'=>'Luis Angel Peña Mora',
        ]); 
        DB::table('ordenCompra')->insert([
            'fechaOrdenCompra'=>'27/11/2024',
            'paraOrdenCompra'=>'Taller Los Peñas',
            'conceptoOrdenCompra'=>'Pieza',
            'detalleOrdenCompra'=>'Filtro de gasolina',
            'empleadoOrdenCompra'=>'Jesus Liadeo Chavez Chavez',
            'importeOrdenCompra'=>'2000',
            'autorizoOrdenCompra'=>'Luis Angel Peña Mora',
        ]);
    }
}
